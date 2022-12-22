<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->string('open_registration_date');
            $table->string('last_date_for_filling_the_form');
            $table->string('available_lands');
            $table->string('sorting_date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('open_registration_date');
            $table->dropColumn('last_date_for_filling_the_form');
            $table->dropColumn('available_lands');
            $table->dropColumn('sorting_date');
        });
    }
};
