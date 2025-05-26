<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_factura')->unique();
            $table->string('nombre_clinia');
            $table->string('direccion_clinica');
            $table->string('NIF_clinica')->unique();
            $table->string('email_clinica')->unique();
            $table->string('telefono_clinica');
            $table->string('nombre_cliente');
            $table->string('dato_empresa');
            $table->string('dato_nombre');
            $table->string('dato_apellidos');
            $table->string('dato_direccion');
            $table->string('dato_telefono');
            $table->string('dato_email')->unique();
            $table->string('dato_DNI')->unique();
            $table->date('fecha_emision');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('productos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
