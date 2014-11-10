<?php

use Illuminate\Database\Migrations\Migration;

class CriarUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('usuarios', function($table)
            {
                $table->increments('id');
                $table->string('email', 255);
                $table->string('password', 60);
                $table->string('nome', 255);
                $table->string('telefone', 30);
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
		Schema::drop('usuarios');
	}
}