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
        Schema::table('site_configs', function (Blueprint $table) {
            $table->string('work_steps_title')->nullable()->default('How We Work');
            $table->text('work_steps_subtitle')->nullable()->default('A seamless process designed to save you time and ensure top-quality results');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn(['work_steps_title', 'work_steps_subtitle']);
        });
    }
};
