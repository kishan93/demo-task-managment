<?php

namespace App\Models;

use App\Models\Traits\BelongsToProject;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use BelongsToUser;
    use BelongsToProject;

    protected $fillable = [
        'title',
        'body',
        'status',
        'priority',
        'project_id',
    ];

    protected $appends = ['created_date'];

    public function createdDate():Attribute
    {
        return Attribute::get(fn() => $this->created_at->format('d/m/Y'));
    }
}
