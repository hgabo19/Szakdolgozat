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
        Schema::table('meals', function (Blueprint $table) {
            $table->float('carbonhydrates', 4, 1)->default(0)->after('calories');
            $table->float('fats', 4, 1)->default(0)->after('carbonhydrates');
            $table->float('protein', 4, 1)->default(0)->after('fats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meals', function (Blueprint $table) {
            $table->dropColumn('carbonhydrates');
            $table->dropColumn('fats');
            $table->dropColumn('protein');
        });
    }
};
