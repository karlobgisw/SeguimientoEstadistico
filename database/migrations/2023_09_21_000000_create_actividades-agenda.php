<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiasSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_semana', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_dia');
            $table->timestamps();
        });

        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        foreach ($dias as $dia) {
            DB::table('dias_semana')->insert([
                'nombre_dia' => $dia,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dias_semana');
    }
}

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_actividad');
            $table->timestamps();
        });

        $actividades = ['Actividad 1', 'Actividad 2', 'Actividad 3', 'Actividad 4', 'Actividad 5', 'Actividad 6', 'Actividad 7', 'Actividad 8', 'Actividad 9', 'Actividad 10'];
        foreach ($actividades as $actividad) {
            DB::table('actividades')->insert([
                'nombre_actividad' => $actividad,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}

class CreateAgendaAgenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_agente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dia_semana_id');
            $table->string('momento_dia');
            $table->unsignedInteger('actividad_id');
            $table->timestamps();

            $table->foreign('dia_semana_id')->references('id')->on('dias_semana');
            $table->foreign('actividad_id')->references('id')->on('actividades');
        });

        $datos = [
            ['dia_semana_id' => 1, 'momento_dia' => 'Mañana', 'actividad_id' => 1],
            ['dia_semana_id' => 2, 'momento_dia' => 'Tarde', 'actividad_id' => 2],
            ['dia_semana_id' => 3, 'momento_dia' => 'Noche', 'actividad_id' => 3],
            ['dia_semana_id' => 4, 'momento_dia' => 'Mañana', 'actividad_id' => 4],
            ['dia_semana_id' => 5, 'momento_dia' => 'Tarde', 'actividad_id' => 5],
            ['dia_semana_id' => 6, 'momento_dia' => 'Noche', 'actividad_id' => 6],
            ['dia_semana_id' => 7, 'momento_dia' => 'Mañana', 'actividad_id' => 7]
        ]
    }
}
