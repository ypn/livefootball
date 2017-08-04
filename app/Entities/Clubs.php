<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $guarded = ['id'];
    protected $table = 'clubs';
}
