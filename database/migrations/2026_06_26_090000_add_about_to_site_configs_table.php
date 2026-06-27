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
            $table->string('about_title')->nullable()->default('Innovation meets precision.');
            $table->text('about_subtitle')->nullable()->default('Welcome to Fourplusone. We are a premier IT Software House dedicated to bridging the gap between complex business needs and elegant digital experiences');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn(['about_title', 'about_subtitle']);
        });
    }
};
