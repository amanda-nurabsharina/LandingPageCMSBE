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
            if (!Schema::hasColumn('site_configs', 'contact_title')) {
                $table->string('contact_title')->default('Kirimkan Pesan atau Konsultasi Gratis');
            }
            if (!Schema::hasColumn('site_configs', 'contact_subtitle')) {
                $table->text('contact_subtitle')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn(['contact_title', 'contact_subtitle']);
        });
    }
};
