<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->bigIncrements('id');
            $table->integer('asset_id');
            $table->string('requester');
            $table->date('date');
            $table->string('from');
            $table->string('to');
            $table->integer('quantity');
            $table->text('job_instructions')->nullable();
            $table->text('site_contact_details')->nullable();
            $table->enum('status', ['pending', 'reserved', 'completed','postponed', 'cancelled'])->default('pending');
            $table->timestamps();
        });

        DB::update("ALTER TABLE jobs AUTO_INCREMENT = 1000;");
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
