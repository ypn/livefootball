<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $guarded = ['id'];
    protected $table = 'permissions';
}
