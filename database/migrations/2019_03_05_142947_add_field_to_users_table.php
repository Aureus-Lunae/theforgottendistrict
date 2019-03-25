<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('builder')->default(false);
            $table->boolean('event')->default(false);
            $table->boolean('banned')->default(false);
            $table->date('banned_until')->nullable();
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
            $table->dropColumn('builder');
            $table->dropColumn('event');
            $table->dropColumn('banned');
            $table->dropColumn('banned_until');
        });
    }
}
