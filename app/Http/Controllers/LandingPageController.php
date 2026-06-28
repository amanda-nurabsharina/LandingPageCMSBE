<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use App\Models\HeroSection;
use App\Models\HeroBackground;
use App\Models\HeroCarousel;
use App\Models\WhyChooseUs;
use App\Models\Statistic;
use App\Models\Service;
use App\Models\OrderStep;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\LandingSection;
use App\Models\CtaSection;
use App\Models\AboutItem;
use App\Models\ServicePremium;
use App\Models\WorkStep;
use Illuminate\Http\JsonResponse;

class LandingPageController extends Controller
{
    public function index(): JsonResponse
    {
        // Fetch or create single-record configurations with robust defaults
        $siteConfig = SiteConfig::firstOrCreate([
            'id' => 1
        ], [
            'site_name' => 'PrintHub',
            'whatsapp_number' => '628123456789',
            'email' => 'info@printhub.com',
            'address' => 'Jl. Percetakan Indah No. 45, Jakarta Selatan',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'twitter_url' => 'https://twitter.com',
            'primary_color' => '#881337',
            'secondary_color' => '#0F172A',
            'accent_color' => '#F59E0B',
            'background_color' => '#F8FAFC',
            'contact_title' => 'Kirimkan Pesan atau Konsultasi Gratis',
            'contact_subtitle' => 'Punya pertanyaan mengenai bahan, ukuran cetakan, atau ingin mendiskusikan pesanan khusus (custom)? Isi formulir, tim ahli kami akan segera menghubungi Anda.',
            'news_title' => 'Berita & Informasi Terkini',
            'news_subtitle' => 'Ikuti perkembangan terbaru mengenai layanan, promo, dan tips seputar percetakan digital kami.',
            'activities_title' => 'Aktifitas & Dokumentasi',
            'activities_subtitle' => 'Dokumentasi portofolio kerja, kesibukan tim cetak, serta event penting yang kami hadiri.',
            'services_title' => 'Solusi Percetakan Cetak Custom Lengkap',
            'services_subtitle' => 'Kami siap mencetak berbagai produk kebutuhan branding, promosi, dan bisnis Anda dengan mesin berteknologi canggih.',
            'portfolio_title' => 'Hasil Cetakan Terbaik Kami',
            'portfolio_subtitle' => 'Berikut adalah beberapa galeri foto produk cetakan yang telah diselesaikan untuk klien-klien kami yang puas.',
            'order_steps_title' => 'Cara Pemesanan Sangat Mudah',
            'order_steps_subtitle' => 'Cukup selesaikan 4 langkah mudah berikut untuk mewujudkan ide Anda dalam hasil cetak siap pakai.',
            'testimonials_title' => 'Apa Kata Pelanggan Setia Kami',
            'testimonials_subtitle' => 'Kelegaan dan kepuasan pelanggan adalah komitmen utama kami. Simak penilaian langsung mereka.',
            'footer_description' => 'Menyediakan layanan cetak banner, stiker kemasan, brosur, kartu nama, dan aneka merchandise digital berkualitas tinggi dengan pengerjaan kilat.',
            'about_title' => 'Innovation meets precision.',
            'about_subtitle' => 'Welcome to Fourplusone. We are a premier IT Software House dedicated to bridging the gap between complex business needs and elegant digital experiences',
            'service_premium_title' => 'Services We Provide',
            'service_premium_subtitle' => 'Tailored solutions for every need—whether scaling an enterprise or celebrating a milestone.',
            'work_steps_title' => 'How We Work',
            'work_steps_subtitle' => 'A seamless process designed to save you time and ensure top-quality results',
            'branches_badge' => 'Lokasi Cabang',
            'branches_title' => 'Temukan Cabang Terdekat Kami',
            'branches_subtitle' => 'Kunjungi gerai fisik kami untuk berkonsultasi langsung atau mengambil pesanan Anda.',
            'clients_title' => 'Klien Kami',
            'clients_subtitle' => 'Telah dipercaya oleh berbagai perusahaan dan institusi di Indonesia untuk solusi percetakan berkualitas.',
        ]);

        // Programmatic default filler for existing records
        $configUpdated = false;
        if (empty($siteConfig->branches_badge)) {
            $siteConfig->branches_badge = 'Lokasi Cabang';
            $configUpdated = true;
        }
        if (empty($siteConfig->branches_title)) {
            $siteConfig->branches_title = 'Temukan Cabang Terdekat Kami';
            $configUpdated = true;
        }
        if (empty($siteConfig->branches_subtitle)) {
            $siteConfig->branches_subtitle = 'Kunjungi gerai fisik kami untuk berkonsultasi langsung atau mengambil pesanan Anda.';
            $configUpdated = true;
        }
        if (empty($siteConfig->clients_title)) {
            $siteConfig->clients_title = 'Klien Kami';
            $configUpdated = true;
        }
        if (empty($siteConfig->clients_subtitle)) {
            $siteConfig->clients_subtitle = 'Telah dipercaya oleh berbagai perusahaan dan institusi di Indonesia untuk solusi percetakan berkualitas.';
            $configUpdated = true;
        }
        if ($configUpdated) {
            $siteConfig->save();
        }

        $heroSection = HeroSection::firstOrCreate([
            'id' => 1
        ], [
            'badge' => 'Percetakan Digital',
            'title' => 'Wujudkan Ide Anda Dalam Cetakan',
            'subtitle' => 'Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.',
            'primary_btn_text' => 'Pesan Sekarang',
            'primary_btn_url' => '#order',
            'secondary_btn_text' => 'Layanan Kami',
            'secondary_btn_url' => '#services',
        ]);

        $heroBackground = HeroBackground::firstOrCreate([
            'id' => 1
        ], [
            'badge' => 'Bisnis Digital',
            'title' => 'Wujudkan Ide Anda Dalam Cetakan',
            'subtitle' => 'Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.',
            'primary_btn_text' => 'Pesan Sekarang',
            'primary_btn_url' => '#order',
            'secondary_btn_text' => 'Layanan Kami',
            'secondary_btn_url' => '#services',
        ]);

        $heroCarousel = HeroCarousel::firstOrCreate([
            'id' => 1
        ], [
            'badge' => 'Promo Unggulan',
            'title' => 'Wujudkan Ide Anda Dalam Cetakan',
            'subtitle' => 'Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.',
            'primary_btn_text' => 'Pesan Sekarang',
            'primary_btn_url' => '#order',
            'secondary_btn_text' => 'Layanan Kami',
            'secondary_btn_url' => '#services',
            'carousel_images' => [],
        ]);

        $whyChooseUs = WhyChooseUs::firstOrCreate([
            'id' => 1
        ], [
            'title' => 'Mengapa Memilih Kami?',
            'subtitle' => 'Prioritas utama kami adalah memberikan hasil cetak dengan kualitas premium, pengerjaan cepat, dan pelayanan terbaik untuk Anda.',
            'features' => [
                'Kualitas cetak tajam & presisi',
                'Tim desainer profesional',
                'Pengerjaan cepat & tepat waktu',
                'Harga terjangkau & kompetitif',
            ],
        ]);

        $ctaSection = CtaSection::firstOrCreate([
            'id' => 1
        ], [
            'title' => 'Siap Mencetak Ide Anda?',
            'subtitle' => 'Yuk, mulai konsultasi gratis dengan tim ahli kami untuk mendapatkan hasil terbaik untuk bisnismu!',
            'btn_text' => 'Pesan Sekarang',
            'btn_url' => 'whatsapp',
        ]);

        // If Statistics are empty, seed some default records
        if (Statistic::count() === 0) {
            Statistic::create(['value' => '500+', 'label' => 'Klien Puas', 'sort_order' => 1]);
            Statistic::create(['value' => '10,000+', 'label' => 'Produk Terkirim', 'sort_order' => 2]);
            Statistic::create(['value' => '5 Tahun', 'label' => 'Pengalaman', 'sort_order' => 3]);
            Statistic::create(['value' => '4.9/5', 'label' => 'Rating Klien', 'sort_order' => 4]);
        }

        // If Services are empty, seed some default records
        if (Service::count() === 0) {
            Service::create([
                'title' => 'Spanduk & Banner',
                'description' => 'Cetak spanduk berkualitas tinggi dengan warna tajam untuk kebutuhan promosi bisnis Anda.',
                'icon' => 'printer',
                'sort_order' => 1
            ]);
            Service::create([
                'title' => 'Stiker & Label',
                'description' => 'Stiker kemasan produk, label pengiriman, cutting stiker vinyl tahan air berkualitas tinggi.',
                'icon' => 'tag',
                'sort_order' => 2
            ]);
            Service::create([
                'title' => 'Brosur & Flyer',
                'description' => 'Media promosi lipat dua, lipat tiga, brosur pamflet dengan kertas art paper mengkilap.',
                'icon' => 'file-text',
                'sort_order' => 3
            ]);
            Service::create([
                'title' => 'ID Card & Kartu Nama',
                'description' => 'Cetak kartu nama instan, id card karyawan PVC tebal berkualitas premium.',
                'icon' => 'credit-card',
                'sort_order' => 4
            ]);
            Service::create([
                'title' => 'Kemasan & Packaging',
                'description' => 'Dus makanan, paper bag cetak custom untuk meningkatkan branding produk Anda.',
                'icon' => 'package',
                'sort_order' => 5
            ]);
            Service::create([
                'title' => 'Merchandise & Souvenir',
                'description' => 'Cetak mug, gantungan kunci, kipas, pulpen custom logo perusahaan Anda.',
                'icon' => 'gift',
                'sort_order' => 6
            ]);
        }

        // If Order Steps are empty, seed default records
        if (OrderStep::count() === 0) {
            OrderStep::create(['step_number' => 1, 'title' => 'Konsultasi', 'description' => 'Hubungi kami via WhatsApp untuk konsultasi bahan, ukuran, dan jumlah cetak.', 'icon' => 'message-square', 'sort_order' => 1]);
            OrderStep::create(['step_number' => 2, 'title' => 'Desain', 'description' => 'Kirim file desain Anda atau gunakan jasa tim desainer kami untuk hasil maksimal.', 'icon' => 'edit', 'sort_order' => 2]);
            OrderStep::create(['step_number' => 3, 'title' => 'Cetak', 'description' => 'Proses cetak cepat menggunakan mesin digital printing berteknologi modern.', 'icon' => 'printer', 'sort_order' => 3]);
            OrderStep::create(['step_number' => 4, 'title' => 'Selesai', 'description' => 'Hasil cetakan siap diambil atau dikirim langsung ke alamat Anda dengan aman.', 'icon' => 'check', 'sort_order' => 4]);
        }

        // If Testimonials are empty, seed default records
        if (Testimonial::count() === 0) {
            Testimonial::create([
                'client_name' => 'Rian Diantono',
                'client_role' => 'Pemilik Kedai Kopi',
                'stars' => 5,
                'content' => 'Sangat puas dengan cetakan stiker kemasan cup kopi saya. Warnanya tajam, tidak luntur bila terkena air, dan pengerjaannya sangat cepat!',
                'sort_order' => 1
            ]);
            Testimonial::create([
                'client_name' => 'Sari Dewi',
                'client_role' => 'Kreatif Agensi',
                'stars' => 5,
                'content' => 'Brosur lipat tiga kami dicetak dengan kertas berkualitas tinggi. Layout-nya pas dan potongan rapi sekali. Rekomendasi buat percetakan profesional.',
                'sort_order' => 2
            ]);
            Testimonial::create([
                'client_name' => 'Yusuf Wibowo',
                'client_role' => 'Panitia Acara Seminar',
                'stars' => 5,
                'content' => 'Pesan spanduk backdrop acara di PrintHub secara mendadak tetapi bisa selesai tepat waktu. Kualitas bahan tebal dan pelayanan admin sangat ramah.',
                'sort_order' => 3
            ]);
        }

        // If Landing Sections are empty, seed default records
        if (LandingSection::count() === 0) {
            LandingSection::create(['section_key' => 'hero', 'title' => 'Hero (Judul Utama & Banner)', 'is_active' => true, 'sort_order' => 1]);
            LandingSection::create(['section_key' => 'statistics', 'title' => 'Statistik Bar (Pencapaian)', 'is_active' => true, 'sort_order' => 2]);
            LandingSection::create(['section_key' => 'services', 'title' => 'Layanan Cetak (Services)', 'is_active' => true, 'sort_order' => 3]);
            LandingSection::create(['section_key' => 'benefits', 'title' => 'Keunggulan Kami (Why Choose Us)', 'is_active' => true, 'sort_order' => 4]);
            LandingSection::create(['section_key' => 'portfolio', 'title' => 'Galeri Portofolio', 'is_active' => true, 'sort_order' => 5]);
            LandingSection::create(['section_key' => 'timeline', 'title' => 'Langkah Pemesanan (Cara Pesan)', 'is_active' => true, 'sort_order' => 6]);
            LandingSection::create(['section_key' => 'testimonials', 'title' => 'Testimoni Pelanggan', 'is_active' => true, 'sort_order' => 7]);
            LandingSection::create(['section_key' => 'cta', 'title' => 'Banner Hubungi Kami (CTA)', 'is_active' => true, 'sort_order' => 8]);
        }

        // Ensure news and activities landing sections exist
        LandingSection::firstOrCreate(['section_key' => 'news'], [
            'title' => 'Berita Terbaru',
            'is_active' => true,
            'sort_order' => 9,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'activities'], [
            'title' => 'Aktifitas Terbaru',
            'is_active' => true,
            'sort_order' => 10,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'contact'], [
            'title' => 'Formulir Kontak (Leads)',
            'is_active' => true,
            'sort_order' => 11,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'hero_background'], [
            'title' => 'Hero Background Image (Latar Penuh)',
            'is_active' => false,
            'sort_order' => 12,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'hero_carousel'], [
            'title' => 'Hero Carousel Image (Slideshow)',
            'is_active' => false,
            'sort_order' => 13,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'about'], [
            'title' => 'Tentang Kami',
            'is_active' => true,
            'sort_order' => 14,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'services_premium'], [
            'title' => 'Layanan Premium (Grid)',
            'is_active' => true,
            'sort_order' => 15,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'work_steps'], [
            'title' => 'Cara Kerja (Grid)',
            'is_active' => true,
            'sort_order' => 16,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'branches'], [
            'title' => 'Lokasi Cabang Kami (Google Maps)',
            'is_active' => true,
            'sort_order' => 17,
        ]);
        LandingSection::firstOrCreate(['section_key' => 'clients'], [
            'title' => 'Daftar Klien Kami (Logos Slider)',
            'is_active' => true,
            'sort_order' => 18,
        ]);

        // If About Items are empty, seed default records
        if (AboutItem::count() === 0) {
            AboutItem::create([
                'title' => 'Innovation at Our Core',
                'description' => 'We design and develop cutting-edge software solutions tailored to your business needs, ensuring high scalability and modern performance.',
                'sort_order' => 1
            ]);
            AboutItem::create([
                'title' => 'Precision & Performance',
                'description' => 'Our engineering processes guarantee bug-free, high-performance applications built with clean, maintainable architecture.',
                'sort_order' => 2
            ]);
            AboutItem::create([
                'title' => 'Seamless Integration',
                'description' => 'Connect your systems, APIs, and workflows seamlessly with robust security and zero friction.',
                'sort_order' => 3
            ]);
        }

        // If Service Premiums are empty, seed default records
        if (ServicePremium::count() === 0) {
            ServicePremium::create([
                'title' => 'Mobile Development',
                'description' => 'iOS & Android native and hybrid applications designed for exceptional user experiences',
                'button_text' => 'Start Project',
                'button_url' => 'whatsapp',
                'sort_order' => 1,
            ]);
            ServicePremium::create([
                'title' => 'Website Development',
                'description' => 'High-performance landing pages, corporate websites, and modern web applications.',
                'button_text' => 'Start Project',
                'button_url' => 'whatsapp',
                'sort_order' => 2,
                'image_path' => null,
            ]);
            ServicePremium::create([
                'title' => 'Custom Dashboards',
                'description' => 'Data management, ERP, and CRM solutions tailored to streamline your business operations.',
                'button_text' => 'Start Project',
                'button_url' => 'whatsapp',
                'sort_order' => 3,
                'image_path' => null,
            ]);
            ServicePremium::create([
                'title' => 'Wedding Templates',
                'description' => 'Aesthetic, interactive digital invitations to make your special day unforgettable.',
                'button_text' => 'Start Project',
                'button_url' => 'whatsapp',
                'sort_order' => 4,
                'image_path' => null,
            ]);
        }

        // If Work Steps are empty, seed default records
        if (WorkStep::count() === 0) {
            WorkStep::create([
                'title' => 'Consultation',
                'description' => 'Share your vision, requirements, and business goals with our expert team.',
                'sort_order' => 1,
            ]);
            WorkStep::create([
                'title' => 'Design & Planning',
                'description' => 'We map out the UX flow and visual architecture tailored perfectly to your brand.',
                'sort_order' => 2,
            ]);
            WorkStep::create([
                'title' => 'Launch & Support',
                'description' => 'Seamless deployment and ongoing maintenance to keep your product running perfectly.',
                'sort_order' => 3,
            ]);
            WorkStep::create([
                'title' => 'Fast Delivery',
                'description' => 'Rapid development with regular updates and continuous feedback loops.',
                'sort_order' => 4,
            ]);
        }

        // Fetch dynamic lists sorted by order
        $statistics = Statistic::orderBy('sort_order')->get();
        $services = Service::orderBy('sort_order')->get();
        $orderSteps = OrderStep::orderBy('step_number')->get();
        $portfolios = Portfolio::orderBy('sort_order')->get();
        $testimonials = Testimonial::orderBy('sort_order')->get();
        $sections = LandingSection::orderBy('sort_order')->get();
        $aboutItems = AboutItem::orderBy('sort_order')->get();
        $servicePremiums = ServicePremium::orderBy('sort_order')->get();
        $workSteps = WorkStep::orderBy('sort_order')->get();

        // Fetch latest 5 news and activities
        $latestNews = \App\Models\News::orderBy('created_at', 'desc')->limit(5)->get();
        $latestActivities = \App\Models\Activity::orderBy('created_at', 'desc')->limit(5)->get();

        if (\App\Models\Branch::count() === 0) {
            \App\Models\Branch::create([
                'name' => 'Printhub Jakarta Pusat',
                'address' => 'Jl. Percetakan Negara Raya No. 12, Cempaka Putih, Jakarta Pusat, 10520',
                'latitude' => '-6.184323',
                'longitude' => '106.861234',
                'phone' => '628123456789',
                'is_active' => true,
                'sort_order' => 1
            ]);
        }

        $branches = \App\Models\Branch::where('is_active', true)->orderBy('sort_order')->get();

        if (\App\Models\Client::count() === 0) {
            \App\Models\Client::create([
                'name' => 'Maju Jaya Company',
                'logo' => 'clients/default.png',
                'website_url' => 'https://google.com',
                'is_active' => true,
                'sort_order' => 1
            ]);
        }
        $clients = \App\Models\Client::where('is_active', true)->orderBy('sort_order')->get();

        // Consolidated response
        return response()->json([
            'status' => 'success',
            'data' => [
                'site_config' => $siteConfig,
                'hero_section' => $heroSection,
                'hero_background' => $heroBackground,
                'hero_carousel' => $heroCarousel,
                'why_choose_us' => $whyChooseUs,
                'cta_section' => $ctaSection,
                'statistics' => $statistics,
                'services' => $services,
                'order_steps' => $orderSteps,
                'portfolios' => $portfolios,
                'testimonials' => $testimonials,
                'sections' => $sections,
                'about_items' => $aboutItems,
                'service_premiums' => $servicePremiums,
                'work_steps' => $workSteps,
                'news' => $latestNews,
                'activities' => $latestActivities,
                'branches' => $branches,
                'clients' => $clients,
            ]
        ]);
    }
}
