<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'status_in_family',
        'grade',
        'class',
        'school',
        'status_with_parents',
        'photo',
        'coordinator_id',
        'child_parent_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function child_parent()
    {
        return $this->belongsTo('App\Models\child_parent');
    }

}
