<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->id();
            $table->string('inventario');
            $table->decimal('importe', 8, 2);
            $table->integer('numero');
            $table->string('ubicacion');
            $table->string('numero_red');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oficinas');
    }
};
