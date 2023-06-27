<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organization extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $guard_name = 'organization';
    protected $guard = 'organization';
    protected $fillable=[
        'name',
        'email',
        'password',
        'status',
        'image',
    ];
}
