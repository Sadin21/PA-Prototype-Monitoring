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
        'regis_status',
        'user_id',
        'coordinator_id',
        'child_parent_id',
    ];

    public function account()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator_id');
    }

    public function donate_report()
    {
        return $this->hasOne('App\Models\donate_report');
    }
}
