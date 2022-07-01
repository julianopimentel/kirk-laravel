<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class historicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		error_log('Created table historics');
		Schema::connection('tenant')->create('historics', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('balance_id')->nullable();
			$table->float('amount', 10, 0);
			$table->float('sub_total', 10, 0);
			$table->float('total_tax', 10, 0);
			$table->float('discount', 10, 0);
			$table->float('total_before', 10, 0);
			$table->float('total_after', 10, 0);
			$table->float('rendimento', 10, 0)->nullable();
			$table->integer('user_id_transaction')->nullable();
			$table->string('type');
            $table->string('tipo')->nullable();
            $table->string('pag')->nullable();
			$table->json('itens')->nullable();
			$table->date('date');
			$table->string('observacao')->nullable();
			$table->integer('user_id');
            $table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
