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
            $table->string('primary_color')->default('#881337'); // Wine Red
            $table->string('secondary_color')->default('#0F172A'); // Navy
            $table->string('accent_color')->default('#F59E0B'); // Gold
            $table->string('background_color')->default('#F8FAFC'); // Slate 50
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn(['primary_color', 'secondary_color', 'accent_color', 'background_color']);
        });
    }
};
