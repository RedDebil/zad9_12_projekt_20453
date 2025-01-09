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
        Schema::create('produkty', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 30);
            $table->text('opis');
            $table->decimal('cena', 8, 2);
            $table->foreignId('kategoria_id')->constrained('kategoria');
            $table->foreignId('dostawca_id')->constrained('dostawca');
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
        Schema::dropIfExists('produkty');
    }
};
