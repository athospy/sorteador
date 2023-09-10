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
    public function up(): void
    {
        if (Schema::hasTable('clientes')) {
            return;
        }
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
			$table->string('cedula');
			$table->string('nombre');
			$table->string('ciudad');
			$table->string('local');
			$table->string('nro_factura');
			$table->string('producto');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
