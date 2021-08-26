<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('A_paterno',30);
            $table->string('A_materno',30);
            $table->date('F_nacimiento');
            $table->tinyInteger('edad');
            $table->string('calle',40);
            $table->string('N_exterior',10);
            $table->string('N_interior',10);
            $table->string('colonia',30);
            $table->string('municipio',40);
            $table->string('estado',25);
            $table->string('E_calles',100);
            $table->string('referencias',100);
            $table->integer('T_casa');
            $table->integer('T_movil');
            $table->string('rfc',13);
            $table->string('curp',18);
            $table->integer('nss');
            $table->string('T_sangre',15);
            $table->string('enfermedades',100);
            $table->string('escolaridad',50);
            $table->string('sexo',10);
            $table->string('F_nombre',50);
            $table->integer('F_telefono');
            $table->string('puesto',25);
            $table->string('E_civil',15);

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
        Schema::dropIfExists('empleados');
    }
}
