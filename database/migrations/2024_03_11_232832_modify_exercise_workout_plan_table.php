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
        Schema::table('exercise_workout_plan', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->integer('sets')->after('day');
            $table->integer('reps')->after('sets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exercise_workout_plan', function (Blueprint $table) {
            $table->dropColumn('sets');
            $table->dropColumn('reps');
        });
    }
};
