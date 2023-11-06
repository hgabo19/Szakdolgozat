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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('password');
            $table->integer('weight')->nullable()->after('age');
            $table->integer('calorie_goal')->nullable()->after('weight');
            $table->unsignedBigInteger('workout_plan_id')->nullable()->after('weight');
            $table->foreign('workout_plan_id')->references('id')->on('workout_plans')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('weight');
            $table->dropColumn('calorie_goal');
            $table->dropForeign('workout_plan_id');
            $table->dropColumn('workout_plan_id');
        });
    }
};
