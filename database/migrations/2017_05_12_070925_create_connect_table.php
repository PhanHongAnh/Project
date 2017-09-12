<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('persons');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('persons');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('comment', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('persons');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('suggests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
