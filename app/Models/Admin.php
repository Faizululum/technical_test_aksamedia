<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory, HasUuids, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'password',
        'phone',
        'email',
    ];
}
