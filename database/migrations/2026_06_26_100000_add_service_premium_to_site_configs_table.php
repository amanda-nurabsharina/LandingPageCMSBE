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
            if (!Schema::hasColumn('site_configs', 'service_premium_title')) {
                $table->string('service_premium_title')->nullable()->default('Services We Provide');
            }
            if (!Schema::hasColumn('site_configs', 'service_premium_subtitle')) {
                $table->string('service_premium_subtitle', 2000)->nullable()->default('Tailored solutions for every need—whether scaling an enterprise or celebrating a milestone.');
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
            if (Schema::hasColumn('site_configs', 'service_premium_title')) {
                $columns[] = 'service_premium_title';
            }
            if (Schema::hasColumn('site_configs', 'service_premium_subtitle')) {
                $columns[] = 'service_premium_subtitle';
            }
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
