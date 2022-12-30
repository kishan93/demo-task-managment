<?php

namespace App\Models;

use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $fillable = [
        'name',
        'color',
    ];

    protected $appends = ['created_date'];

    public function createdDate():Attribute
    {
        return Attribute::get(fn() => $this->created_at->format('d/m/Y'));
    }
}
