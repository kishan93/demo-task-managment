<?php


namespace App\Models\Traits;


use App\Models\Project;
use App\Models\Scopes\ProjectScope;


/**
 * Trait BelongsToProject
 * @package App\Models\Traits
 */
trait BelongsToProject
{

    protected static function bootBelongsToProject()
    {
        static::addGlobalScope(new ProjectScope());
        static::creating(function ($model) {
            if (session()->has('project_id')) {
                $model->project_id = session()->get('project_id');
            }
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
