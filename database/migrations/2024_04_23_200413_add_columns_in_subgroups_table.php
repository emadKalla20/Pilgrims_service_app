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
        Schema::table('subgroups', function (Blueprint $table) {
            $table->unsignedBigInteger('main_group_id')->nullable();
            $table->foreign('main_group_id')
                ->references('id')
                ->on('main_groups')
                ->onUpdate('no action')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subgroups', function (Blueprint $table) {
            //
        });
    }
};
