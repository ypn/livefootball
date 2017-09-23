<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded = ['id'];
    protected $table = 'roles';
}
