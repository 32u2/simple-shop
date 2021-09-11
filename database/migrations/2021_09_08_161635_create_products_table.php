<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->user_id(); // not required, we are assuming single admin user..
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->text('image_path')->default('/img/no-image-available.png');
            $table->integer('active')->default(1);
            $table->text('description')->nullable();
            $table->decimal('price');
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

