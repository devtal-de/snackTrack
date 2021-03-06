<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snacks', function($table) {
            $table->increments('id');
            $table->string('name')
                ->index();
            $table->integer('weight');
            $table->integer('euro');
            $table->integer('cent');
            $table->text('description');
            $table->string('image');
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
        Schema::drop('snacks');
    }
}
