<?php

use Illuminate\Database\Migrations\Migration;

class CriarPublicacoes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('publicacoes', function($table)
            {
                $table->increments('id');
                $table->string('nome', 255);
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
		Schema::drop('publicacoes');
	}
}
