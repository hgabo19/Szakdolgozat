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
            $table->string('gender')->nullable()->after('workout_plan_id');
            $table->integer('age')->nullable()->after('gender');
            $table->integer('weight')->nullable()->after('age');
            $table->integer('height')->nullable()->after('weight');
            $table->string('activity_level')->nullable()->after('height');
            $table->integer('calorie_goal')->nullable()->after('activity_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('weight');
            $table->dropColumn('height');
            $table->dropColumn('activity_level');
            $table->dropColumn('calorie_goal');
        });
    }
};
