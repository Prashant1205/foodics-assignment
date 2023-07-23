<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredient_id')->references('id')->on('ingredients');
            $table->float('qty_in_kgs');
            $table->float('qty_used');
            $table->float('percentage')->default(100.0);
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
        Schema::dropIfExists('ingredients_inventories');
    }
};
