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
            $table->string('service_premium_title')->nullable()->default('Services We Provide');
            $table->text('service_premium_subtitle')->nullable()->default('Tailored solutions for every need—whether scaling an enterprise or celebrating a milestone.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn(['service_premium_title', 'service_premium_subtitle']);
        });
    }
};
