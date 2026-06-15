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
            $table->string('news_title')->default('Berita & Informasi Terkini');
            $table->text('news_subtitle')->default('Ikuti perkembangan terbaru mengenai layanan, promo, dan tips seputar percetakan digital kami.');
            $table->string('activities_title')->default('Aktifitas & Dokumentasi');
            $table->text('activities_subtitle')->default('Dokumentasi portofolio kerja, kesibukan tim cetak, serta event penting yang kami hadiri.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn([
                'news_title',
                'news_subtitle',
                'activities_title',
                'activities_subtitle',
            ]);
        });
    }
};
