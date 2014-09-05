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
                $table->text('instituição');
                $table->string('área');
                $table->text('linha de pesquisa');
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
                $table->dropColumn('instituição');
                $table->dropColumn('área');
                $table->dropColumn('linha de pesquisa');
            });
	}

}
