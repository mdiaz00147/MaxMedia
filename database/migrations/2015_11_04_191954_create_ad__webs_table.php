<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdWebsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ad__webs', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('script');
            $table->integer('ad_id')->unsigned();
            $table->foreign('ad_id')
                ->references('id')
                ->on('ads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('web_id')->unsigned();
            $table->foreign('web_id')
                ->references('id')
                ->on('webs')
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
		Schema::drop('ad__webs');
	}

}
