<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseFields extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('shops', function (Blueprint $table) {
$table->increments('id');
$table->string('title');
$table->text('description');
$table->string('preview');
$table->decimal('price', 10,2); //ограничем ценник 8 значным числом с копейками
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
Schema::drop('shops');
}
}