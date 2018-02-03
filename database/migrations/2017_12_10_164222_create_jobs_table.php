<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('job_type_id');
            $table->integer('category_id');
            $table->integer('post_id');
            $table->integer('degree_id');
            $table->integer('status')->default($value = 0);
            $table->string('title');
            $table->longText('description');
            $table->string('position');
            $table->string('terms')->nullable();
            $table->integer('duration')->nullable();   // ?? in months or weeks ??
            $table->double('hourly_wage');
            $table->boolean('home');
            $table->integer('trial')->nullable();      // in days
            $table->double('work_time');   //hours per day
            $table->boolean('weekends');
            $table->string('address');

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
        Schema::dropIfExists('jobs');
    }
}
