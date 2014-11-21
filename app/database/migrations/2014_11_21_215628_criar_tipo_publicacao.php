<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTipoPublicacao extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('tipos', function($table)
            {
                $table->increments('id');
                $table->string('nome', 255);
                $table->timestamps();
            });
            
            Schema::table('publicacoes', function($table)
            {
                $table->dropColumn('tipo');
            });
            
            Schema::table('publicacoes', function($table)
            {
                $table->integer('tipo_id')->unsigned();
                $table->foreign('tipo_id')->
                    references('id')->
                    on('tipos');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('tipos');
            
            Schema::table('publicacoes', function($table)
            {
                $table->dropForeign('publicacoes_tipo_id_foreign');
		$table->dropColumn('tipo_id');
            });
            
            Schema::table('publicacoes', function($table)
            {
                $table->string('tipo');
            });
	}

}
