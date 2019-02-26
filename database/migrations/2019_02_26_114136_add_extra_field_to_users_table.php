<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pfp')->nullable();
            $table->longText('desc')->nullable();
            $table->tinyInteger('staff')->default(0);
            $table->tinyInteger('rank')->default(0);
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pfp');
            $table->dropColumn('description');
            $table->dropColumn('staff');
            $table->dropColumn('rank');
        });
    }
}
