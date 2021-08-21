<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @author Marlom Marques
 * @version 1.0
 * @since 20/08/2021
 */
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * @author Marlom Marques
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('code');
            $table->string('name');
            $table->decimal('price');
            $table->integer('amount');
            $table->text('description');
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
