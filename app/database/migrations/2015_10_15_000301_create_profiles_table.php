<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('profile_id', 20);
			
			$table->string('profile_username')->unsigned();
			$table->foreign('profile_username')
				  ->references('username')->on('users')
				  ->onDelete('cascade');
			
			$table->date('birthday');
			$table->integer('age');
		});
		
		Schema::create('profile_other_accts', function(Blueprint $table)
		{
			$table->increments('profile_other_accts_id', 20);
			
			$table->integer('profile_id')->unsigned();			
			$table->foreign('profile_id')
				  ->references('profile_id')->on('profiles')
				  ->onDelete('cascade');
			
			$table->string('account', 60);
		});
		
		Schema::create('profile_interests', function(Blueprint $table)
		{
			$table->increments('profile_interests_id', 20);
			
			$table->integer('profile_id')->unsigned();			
			$table->foreign('profile_id')
				  ->references('profile_id')->on('profiles')
				  ->onDelete('cascade');
			
			$table->string('interest', 60);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_other_accts');
		Schema::drop('profile_interests');
		Schema::drop('profiles');
	}

}
