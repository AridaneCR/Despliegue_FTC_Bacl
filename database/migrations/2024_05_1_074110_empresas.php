<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->string('nombre');
            $table->string('nif');
            $table->string('telefono');
            $table->string('email');
            $table->string('estado');
            $table->string('servicio');
            $table->string('horario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }

                                        
            
};
