<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePMTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('PM', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 50);
			$table->text('msg', 1000);
			$table->boolean('read')->default(false);
			$table->boolean('sender_deleted')->default(false);
			$table->boolean('receiver_deleted')->default(false);

			$table->timestamps();

			$table->unsignedInteger('sender_id')->index();
			$table->unsignedInteger('receiver_id')->index();

			$table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('PM');
	}
}
