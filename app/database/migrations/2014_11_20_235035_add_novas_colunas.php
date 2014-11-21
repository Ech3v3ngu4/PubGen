<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNovasColunas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   
            Schema::table('publicacoes', function($table)
            {         
                $table->dropColumn('editora');
                $table->dropColumn('autores');
                $table->dropColumn('editores');
                
                $table->integer('usuario_id')->unsigned();
                $table->foreign('usuario_id')->
                    references('id')->
                    on('usuarios');
            });
            
            Schema::table('editores', function($table)
            {         
                $table->integer('publicacao_id')->unsigned();
                $table->foreign('publicacao_id')->
                    references('id')->
                    on('publicacoes');
            });
            
            Schema::table('autores', function($table)
            {         
                $table->integer('publicacao_id')->unsigned();
                $table->foreign('publicacao_id')->
                    references('id')->
                    on('publicacoes');
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
                $table->string('editora');
                $table->string('autores');
                $table->string('editores');
                $table->dropForeign('publicacoes_usuario_id_foreign');
		$table->dropColumn('usuario_id');
            });
            
            Schema::table('editores', function($table)
            {
                $table->dropForeign('editores_publicacao_id_foreign');
		$table->dropColumn('publicacao_id');
            });
            
            Schema::table('autores', function($table)
            {
                $table->dropForeign('autores_publicacao_id_foreign');
		$table->dropColumn('publicacao_id');
            });
	}

}
