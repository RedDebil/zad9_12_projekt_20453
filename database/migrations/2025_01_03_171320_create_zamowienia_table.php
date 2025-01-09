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
        Schema::create('zamowienia', function (Blueprint $table) {
            $table->id();
            $table->decimal('cena_totalna', 8, 2);
            $table->string('status', 30);
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('adres_id')->constrained('adres');
            $table->foreignId('kurierzy_id')->constrained('kurierzy');
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
        Schema::dropIfExists('zamowienia');
    }
};
