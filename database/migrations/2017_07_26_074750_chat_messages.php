<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChatMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('chat_messages', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('fb_id');
          $table->text('message');
          $table->timestamp('completed_at')->nullable();
          $table->timestamps();

          $table->engine = 'InnoDB';
      });

      Schema::create('clubs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('logo_url');
          $table->timestamp('completed_at')->nullable();
          $table->timestamps();

          $table->engine = 'InnoDB';
      });

      Schema::create('leaguages', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('logo_url');
          $table->string('image_cover');

          $table->timestamp('completed_at')->nullable();
          $table->timestamps();

          $table->engine = 'InnoDB';
      });

      Schema::create('matchs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('leaguage_id');
          $table->integer('team_1');
          $table->integer('team_2');
          $table->tinyInteger('status');
          $table->dateTime('date_start');
          $table->timestamp('completed_at')->nullable();
          $table->timestamps();

          $table->engine = 'InnoDB';
      });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chat_messages');
        Schema::drop('clubs');
        Schema::drop('leaguages');
        Schema::drop('matchs');
    }
}
