<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityAndAddedByAndModifiedByToItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->integer('quantity')->unsigned()->default(0)->after('description');
            $table->string('added_by')->after('quantity');
            $table->string('modified_by')->after('added_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('added_by');
            $table->dropColumn('modified_by');
        });
    }
}
