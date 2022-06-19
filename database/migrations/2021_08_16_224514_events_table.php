<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class eventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		error_log('Created table events');
		Schema::connection('tenant')->create('events', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('title');
			$table->string('body')->nullable();
			$table->date('start');
			$table->date('end');
			$table->string('hora_inicio', 5)->nullable();
			$table->string('hora_fim', 5)->nullable();
			$table->boolean('requer_aprovacao')->nullable()->default(0);
            $table->integer('user_id')->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
