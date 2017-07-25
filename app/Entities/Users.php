<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $guarded = ['id'];
    protected $table = 'users';
}
