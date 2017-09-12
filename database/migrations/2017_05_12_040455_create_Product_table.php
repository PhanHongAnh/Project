<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('avatar');
            $table->float('price');
            $table->string('discrible',5000);
            $table->integer('type');
            $table->boolean('status');
            $table->boolean('is_hot');
            $table->float('rate_point')->default(5);
            $table->integer('rate_count')->default(0);
            $table->integer('new');
            $table->integer('comment_count')->default(0);
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
        Schema::dropIfExists('products');
    }
}
