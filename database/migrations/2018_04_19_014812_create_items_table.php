<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('category');
            $table->integer('brand_id')->unsigned();
            $table->text('name');
            $table->string('itemimage1')->unique();
            $table->string('itemimage2');
            $table->string('itemimage3');
            $table->text('description');
            $table->text('note');
            $table->integer('price');
            $table->integer('barcode');
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
