<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('fecha');
            $table->bigInteger('impresiones');
            $table->bigInteger('click');
            $table->float('ctr');
            $table->float('ecpm');
            $table->float('revenue');
            $table->integer('ad_web_id')->unsigned();
            $table->foreign('ad_web_id')
                ->references('id')
                ->on('ad__webs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
		Schema::drop('reports');
	}

}
