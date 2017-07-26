<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    protected $guarded = ['id'];
    protected $table = 'chat_messages';
}
