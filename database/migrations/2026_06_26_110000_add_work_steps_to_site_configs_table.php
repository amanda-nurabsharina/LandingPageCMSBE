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
            if (!Schema::hasColumn('site_configs', 'work_steps_title')) {
                $table->string('work_steps_title')->nullable()->default('How We Work');
            }
            if (!Schema::hasColumn('site_configs', 'work_steps_subtitle')) {
                $table->string('work_steps_subtitle', 2000)->nullable()->default('A seamless process designed to save you time and ensure top-quality results');
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
            if (Schema::hasColumn('site_configs', 'work_steps_title')) {
                $columns[] = 'work_steps_title';
            }
            if (Schema::hasColumn('site_configs', 'work_steps_subtitle')) {
                $columns[] = 'work_steps_subtitle';
            }
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
