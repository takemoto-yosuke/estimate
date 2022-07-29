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
            $table->float('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->integer('unit_prise')->nullable();
            $table->integer('prise')->nullable();
            $table->boolean('web_flag')->nullable();
            $table->boolean('app_flag')->nullable();
            $table->string('machine_both')->nullable();            
            $table->boolean('ja_flag')->nullable();
            $table->boolean('eng_flag')->nullable();
            $table->string('lang_both')->nullable();
            $table->integer('checkitem_id');               
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
