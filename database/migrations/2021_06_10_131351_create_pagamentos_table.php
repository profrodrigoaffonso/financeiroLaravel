<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{    protected $fillable = ['categoria_id', 'forma_pagamento_id', 'valor', 'data_hora', 'tipo', 'obs'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('forma_pagamento_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamentos');
            $table->decimal('valor', 10,2);
            $table->datetime('data_hora');
            $table->enum('tipo', ['e', 's'])->default('s');
            $table->text('obs')->nullable();
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
        Schema::dropIfExists('pagamentos');
    }
}
