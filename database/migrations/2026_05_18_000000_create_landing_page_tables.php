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
        // 1. Site Configs (Single record settings)
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('PrintHub');
            $table->string('logo')->nullable();
            $table->string('whatsapp_number')->default('628123456789');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->timestamps();
        });

        // 2. Hero Sections (Single record hero config)
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('primary_btn_text')->nullable();
            $table->string('primary_btn_url')->nullable();
            $table->string('secondary_btn_text')->nullable();
            $table->string('secondary_btn_url')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        // 3. Statistics (Multiple counters)
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // e.g. "500+", "10,000+", "5 Tahun"
            $table->string('label'); // e.g. "Klien Puas"
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 4. Services (Multiple dynamic service cards)
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon'); // Lucide Icon name
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 5. Order Steps (How to order timeline steps)
        Schema::create('order_steps', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number'); // e.g. 1, 2, 3, 4
            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 6. Portfolios (Masonry grid image gallery filterable by category)
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // e.g. Stiker, Kartu, Buku, Brosur, Banner
            $table->string('image_path');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 7. Why Choose Us (Single record layout configuration)
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->json('features'); // JSON array: ["Benefit 1", "Benefit 2"]
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        // 8. Testimonials (Client feedback)
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_role')->nullable();
            $table->integer('stars')->default(5);
            $table->text('content');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('why_choose_us');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('order_steps');
        Schema::dropIfExists('services');
        Schema::dropIfExists('statistics');
        Schema::dropIfExists('hero_sections');
        Schema::dropIfExists('site_configs');
    }
};
