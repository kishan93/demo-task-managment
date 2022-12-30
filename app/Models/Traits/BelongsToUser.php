<?php


namespace App\Models\Traits;


use App\Models\User;
use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Builder;


/**
 * Trait BelongsToStore
 * @package App\Models\Traits
 */
trait BelongsToUser
{

    protected static function bootBelongsToUser()
    {
        static::addGlobalScope(new UserScope());
        static::creating(function ($model) {
            if (auth()->id()) {
                $model->user_id = auth()->id();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
