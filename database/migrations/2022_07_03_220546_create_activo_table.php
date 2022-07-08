<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("descripcion");
            $table->decimal("gasto_total")->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('activos')->insert(
            array(
                'nombre' => 'Laptop Lenovo - Gerencia',
                'descripcion' => 'Laptop del Gerente Comercial',
                'gasto_total' => '150'
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
        Schema::dropIfExists('activos');
    }
}
