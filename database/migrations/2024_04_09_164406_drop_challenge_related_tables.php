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
        Schema::dropIfExists('challenge_days');
        Schema::dropIfExists('user_challenges');
        Schema::dropIfExists('challenges');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
