<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            if (!Schema::hasColumn('site_configs', 'footer_description')) {
                $table->text('footer_description')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('site_configs', 'footer_description')) $columns[] = 'footer_description';
            if (!empty($columns)) $table->dropColumn($columns);
        });
    }
};
