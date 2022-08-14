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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('gov');
            $table->string('city');
            $table->string('region');
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('building')->nullable();
            $table->string('building_unit')->nullable();
            $table->string('unit_floor_type')->nullable();
            $table->string('floor_num')->nullable();
            $table->string('unit_size')->nullable();
            $table->string('unit_model')->nullable();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->on('projects')->references('id');
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
        Schema::dropIfExists('apartments');
    }
};
