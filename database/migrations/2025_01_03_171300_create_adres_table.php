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
        Schema::create('adres', function (Blueprint $table) {
            $table->id();
            $table->string('miejscowosc', 30);
            $table->string('nazwa_ulicy', 30);
            $table->integer('nr_ulicy');
            $table->integer('nr_mieszkania');
            $table->string('typ_adresu', 30);
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
        Schema::dropIfExists('adres');
    }
};
