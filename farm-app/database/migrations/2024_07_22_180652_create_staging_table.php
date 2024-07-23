<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staging', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_id'); //FK
            $table->integer('quantity');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staging');
    }
}

