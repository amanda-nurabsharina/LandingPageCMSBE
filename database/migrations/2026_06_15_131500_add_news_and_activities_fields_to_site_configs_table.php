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
            if (!Schema::hasColumn('site_configs', 'news_title')) {
                $table->string('news_title')->default('Berita & Informasi Terkini');
            }
            if (!Schema::hasColumn('site_configs', 'news_subtitle')) {
                $table->text('news_subtitle')->default('Ikuti perkembangan terbaru mengenai layanan, promo, dan tips seputar percetakan digital kami.');
            }
            if (!Schema::hasColumn('site_configs', 'activities_title')) {
                $table->string('activities_title')->default('Aktifitas & Dokumentasi');
            }
            if (!Schema::hasColumn('site_configs', 'activities_subtitle')) {
                $table->text('activities_subtitle')->default('Dokumentasi portofolio kerja, kesibukan tim cetak, serta event penting yang kami hadiri.');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('site_configs', 'news_title')) $columns[] = 'news_title';
            if (Schema::hasColumn('site_configs', 'news_subtitle')) $columns[] = 'news_subtitle';
            if (Schema::hasColumn('site_configs', 'activities_title')) $columns[] = 'activities_title';
            if (Schema::hasColumn('site_configs', 'activities_subtitle')) $columns[] = 'activities_subtitle';

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
