<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('upload_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->text('code');
            $table->text('sku');
            $table->text('dimensions');
            $table->text('finishes');
            $table->text('location');
            $table->integer('quantity')->default(0);
            $table->integer('available')->default(0);
            $table->integer('reserved')->default(0);
            $table->integer('damaged')->default(0);
            $table->timestamps();
        });

        DB::update("ALTER TABLE assets AUTO_INCREMENT = 100;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
