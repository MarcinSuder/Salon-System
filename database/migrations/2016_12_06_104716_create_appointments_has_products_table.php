<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments_has_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned();
            $table->integer('appointments_id')->unsigned();
            $table->integer('used');
            $table->timestamps();
        });

        Schema::table('appointments_has_products', function (Blueprint $table) {
            $table->foreign('products_id')
                ->references('id')
                ->on('products');

            $table->foreign('appointments_id')
                ->references('id')
                ->on('appointments')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments_has_products');
    }
}
