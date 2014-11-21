<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorrecaoEditora extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('publicacoes', function($table)
            {
                $table->string('editora');
            });
            
            Schema::table('editores', function($table)
            {
                $table->dropColumn('editora');
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
                $table->dropColumn('editora');
            });
	}

}
