<?php


namespace App\Models\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProjectScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (session()->has('project_id')) {
            return $builder->where('project_id', session()->get('project_id'));
        }
        return $builder;
    }
}
