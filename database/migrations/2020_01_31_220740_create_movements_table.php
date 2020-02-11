<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('asset_id');
            $table->enum('type', ['in', 'out']);
            $table->string('job_no');
            $table->string('from');
            $table->string('to');
            $table->integer('quantity')->default(0);
            $table->integer('damaged')->default(0);
            $table->string('po_no');
            $table->text('comments');
            $table->text('bill_materials');
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
        Schema::dropIfExists('movements');
    }
}
