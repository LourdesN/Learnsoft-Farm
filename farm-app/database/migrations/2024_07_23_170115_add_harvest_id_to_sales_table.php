<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHarvestIdToSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('harvest_id')->nullable();
            $table->foreign('harvest_id')->references('id')->on('harvests')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['harvest_id']);
            $table->dropColumn('harvest_id');
        });
    }
}

