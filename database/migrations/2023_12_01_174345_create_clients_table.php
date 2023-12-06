<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->String('dni',10);
            $table->String('apellido',40);
            $table->String('nombre',40);
            $table->String('email',30);
            $table->String('telefono',9);
            $table->String('direccion')->nullable(); //aceptan valores nulos
            $table->string('estado',15)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
