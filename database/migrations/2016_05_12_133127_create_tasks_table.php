<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task', 255);
            $table->string('meta', 255)->nullable();
            $table->integer('catid')->unsigned();
            $table->integer('parenttask')->unsigned()->nullable();
            $table->dateTime('signedoff')->nullable()->nullable();
            $table->integer('taskorder')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
