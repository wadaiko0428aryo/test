<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyWeightTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weight_targets', function (Blueprint $table) {
            $table->decimal('current_weight', 4, 1)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weight_targets', function (Blueprint $table) {
            $table->decimal('current_weight', 4, 1)->change();
        });
    }
}
