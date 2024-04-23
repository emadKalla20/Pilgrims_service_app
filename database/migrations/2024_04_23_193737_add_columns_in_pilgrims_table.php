<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pilgrims', function (Blueprint $table) {
            $table->unsignedBigInteger('subgroup_id')->nullable();
            $table->unsignedBigInteger('main_group_id')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();

            $table->foreign('subgroup_id')
                ->references('id')
                ->on('subgroups')
                ->onDelete('no action')
                ->onUpdate('CASCADE');

            $table->foreign('main_group_id')
                ->references('id')
                ->on('main_groups')
                ->onDelete('no action')
                ->onUpdate('CASCADE');

            $table->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onDelete('no action')
                ->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pilgrims', function (Blueprint $table) {
            $table->dropColumn('subgroup_id');
            $table->dropColumn('main_group_id');
            $table->dropColumn('hotel_id');

            $table->dropForeign('subgroup_id');
            $table->dropForeign('main_group_id');
            $table->dropForeign('hotel_id');
        });
    }
};
