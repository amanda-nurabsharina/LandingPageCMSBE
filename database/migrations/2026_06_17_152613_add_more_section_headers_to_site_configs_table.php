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
            if (!Schema::hasColumn('site_configs', 'services_title')) {
                $table->string('services_title')->default('Solusi Percetakan Cetak Custom Lengkap');
            }
            if (!Schema::hasColumn('site_configs', 'services_subtitle')) {
                $table->text('services_subtitle')->nullable();
            }
            if (!Schema::hasColumn('site_configs', 'portfolio_title')) {
                $table->string('portfolio_title')->default('Hasil Cetakan Terbaik Kami');
            }
            if (!Schema::hasColumn('site_configs', 'portfolio_subtitle')) {
                $table->text('portfolio_subtitle')->nullable();
            }
            if (!Schema::hasColumn('site_configs', 'order_steps_title')) {
                $table->string('order_steps_title')->default('Cara Pemesanan Sangat Mudah');
            }
            if (!Schema::hasColumn('site_configs', 'order_steps_subtitle')) {
                $table->text('order_steps_subtitle')->nullable();
            }
            if (!Schema::hasColumn('site_configs', 'testimonials_title')) {
                $table->string('testimonials_title')->default('Apa Kata Pelanggan Setia Kami');
            }
            if (!Schema::hasColumn('site_configs', 'testimonials_subtitle')) {
                $table->text('testimonials_subtitle')->nullable();
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
            if (Schema::hasColumn('site_configs', 'services_title')) $columns[] = 'services_title';
            if (Schema::hasColumn('site_configs', 'services_subtitle')) $columns[] = 'services_subtitle';
            if (Schema::hasColumn('site_configs', 'portfolio_title')) $columns[] = 'portfolio_title';
            if (Schema::hasColumn('site_configs', 'portfolio_subtitle')) $columns[] = 'portfolio_subtitle';
            if (Schema::hasColumn('site_configs', 'order_steps_title')) $columns[] = 'order_steps_title';
            if (Schema::hasColumn('site_configs', 'order_steps_subtitle')) $columns[] = 'order_steps_subtitle';
            if (Schema::hasColumn('site_configs', 'testimonials_title')) $columns[] = 'testimonials_title';
            if (Schema::hasColumn('site_configs', 'testimonials_subtitle')) $columns[] = 'testimonials_subtitle';

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
