<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDadosPublicacao extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('publicacoes', function($table)
            {
                $table->dropColumn('nome');

                $table->text('titulo');
                $table->text('autores'); //lista json
                $table->string('tipo');
                $table->enum('alcance', array('nacional' ,'internacional'));
                $table->enum('natureza', array('artigo_completo' ,'resumo_expandido', 'resumo'));
                $table->text('editores'); //lista json
                $table->text('titulo_periodico');
                $table->string('editora');
                $table->string('local_publicacao');
                $table->integer('num_paginas');
                $table->integer('ano_publicacao');
            });  
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('publicacoes', function($table)
            {
                $table->string('nome');

                $table->dropColumn('titulo');
                $table->dropColumn('autores'); //lista json
                $table->dropColumn('tipo');
                $table->dropColumn('alcance');
                $table->dropColumn('natureza');
                $table->dropColumn('editores'); //lista json
                $table->dropColumn('titulo_periodico');
                $table->dropColumn('editora');
                $table->dropColumn('local_publicacao');
                $table->dropColumn('num_paginas');
                $table->dropColumn('ano_publicacao');
            });
	}

}
