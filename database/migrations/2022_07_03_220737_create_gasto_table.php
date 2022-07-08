<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("activo_id");
            $table->string("documento_relacionado")->nullable();
            $table->decimal("monto");
            $table->date("fecha_gasto");
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('gastos')->insert(
            array(
                'activo_id' => '1',
                'nombre' => 'Mantenimiento Preventivo e Instalación de Sistema Operativo',
                'documento_relacionado' => 'F001-00000022',
                'monto' => '150',
                'fecha_gasto' => '2022-07-03'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
