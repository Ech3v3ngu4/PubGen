<?php

use Illuminate\Database\Migrations\Migration;

class UpdateDadosUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    
    //Somente username, senha, email, nome completo, nome em publicações
//(pode haver vários), instituição, área e linha de pesquisa.
    
public function up()
	{
            Schema::table('usuarios', function($table)
            {
                $table->dropColumn('telefone');

                $table->string('username');
                $table->string('nome_publicacao');
                $table->text('instituicao');
                $table->string('area');
                $table->text('linha_pesquisa');
            });  
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('usuarios', function($table)
            {
                $table->integer('telefone');

                $table->dropColumn('username');
                $table->dropColumn('nome_publicacao');
                $table->dropColumn('instituicao');
                $table->dropColumn('area');
                $table->dropColumn('linha_pesquisa');
            });
	}

}
