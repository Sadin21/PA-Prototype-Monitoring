<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class child_parent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birth_place',
        'birth_date',
        'marital',
        'tertiary_education',
        'address',
        'job',
        'phone',
        'salary',
        'home_status',
        'number_of_souls',
        'category_of_souls',
    ];

    public function children()
    {
        return $this->hasMany('App\Models\child');
    }
}
