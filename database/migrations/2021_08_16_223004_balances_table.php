<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        error_log('Created table balances');
        Schema::connection('tenant')->create('balances', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('account_id')->default(0);
			$table->float('amount', 10, 0)->default(0);
            $table->boolean('active')->nullable()->default(1);
            $table->string('card_number')->nullable();
            $table->string('card_name')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('card_type')->nullable();
            $table->boolean('habilitar_financeiro')->nullable()->default(0);
            $table->boolean('habilitar_qrcode')->nullable()->default(0);
            $table->timestamps(10);
		});
    }
}
