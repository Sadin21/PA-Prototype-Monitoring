<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donate_report extends Model
{
    use HasFactory;
    protected $fillable = [
        'nominal',
        'status',
        'date',
        'file',
        'child_id',
    ];

    public function child()
    {
        return $this->belongsTo('App\Models\Child');
    }
}
