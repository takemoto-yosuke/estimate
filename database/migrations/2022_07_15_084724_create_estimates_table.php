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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('item')->nullable();
            $table->string('content')->nullable();
            $table->string('quantity')->nullable()->default(NULL);
            $table->string('unit')->nullable();
            $table->string('unit_prise')->nullable()->default(NULL);
            $table->string('prise')->nullable();
            $table->string('machine')->nullable();     
            $table->string('lang')->nullable();
            $table->integer('checkitem_id');      
            $table->integer('order')->default(0);   
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
        Schema::dropIfExists('estimates');
    }
};
