<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('products', function(Blueprint $table)
    {
          $table->increments('id');
            $table->timestamps();
            $table->integer('category_id')->unsigned();
            $table->integer('quantity');
            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->string('title');
            $table->string('product_pic');
            $table->double('price');
            $table->text('description');

     
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
          Schema::drop('products');
    }
}
