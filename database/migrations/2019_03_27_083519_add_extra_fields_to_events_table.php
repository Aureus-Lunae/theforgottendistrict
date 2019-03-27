<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('events', function (Blueprint $table) {
			$table->date('end')->nullable();
			$table->time('endtime')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('events', function (Blueprint $table) {
			$table->dropColumn('end');
			$table->dropColumn('endtime');
		});
	}
}
