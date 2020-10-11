<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDirectoryfilesTable extends Migration {

	public function up()
	{
		Schema::create('directoryfiles', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('filename', 200);
			$table->string('filesize', 200);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('directoryfiles');
	}
}