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
        Schema::create('main_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_entry')->nullable();
            $table->date('exit_date')->nullable();
            $table->integer('office_num')->nullable();
            $table->integer('pilgrims_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_groups');
    }
};
