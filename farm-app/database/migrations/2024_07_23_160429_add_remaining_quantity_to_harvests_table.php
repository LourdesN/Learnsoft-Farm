<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemainingQuantityToHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('harvests', function (Blueprint $table) {
            $table->integer('remaining_quantity')->after('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harvests', function (Blueprint $table) {
            $table->dropColumn('remaining_quantity');
        });
    }
}
