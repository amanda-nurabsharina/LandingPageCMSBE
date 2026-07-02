<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('FourplusOne CMS')
            ->login()
            ->profile()
            ->colors([
                'primary' => '#3c7618',
            ])
            ->navigationGroups([
                'Hero',
                'Profil Perusahaan',
                'Layanan & Portofolio',
                'Testimoni & Klien',
                'Konten & Promosi',
                'Pengaturan',
                'ERP & Keuangan',
                'Manajemen Pengguna',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                \App\Filament\Widgets\FinanceOverview::class,
                \App\Filament\Widgets\SalesChart::class,
                \App\Filament\Widgets\AnalyticsOverview::class,
                \App\Filament\Widgets\VisitorChart::class,
                \App\Filament\Widgets\PopularPagesWidget::class,
            ])
            ->renderHook(
                PanelsRenderHook::SIDEBAR_FOOTER,
                fn (): string => Blade::render('
                    <form action="{{ route(\'filament.admin.auth.logout\') }}" method="POST" style="padding: 12px; border-top: 1px solid #e2e8f0; margin-top: auto;">
                        @csrf
                        <button type="submit" style="display: flex; align-items: center; gap: 8px; width: 100%; padding: 8px 12px; border-radius: 8px; font-size: 14px; font-weight: 600; color: #4b5563; background: transparent; border: none; cursor: pointer; transition: all 0.2s ease-in-out;" onmouseover="this.style.backgroundColor=\'#fee2e2\'; this.style.color=\'#dc2626\'; this.querySelector(\'svg\').style.color=\'#dc2626\';" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'#4b5563\'; this.querySelector(\'svg\').style.color=\'#9ca3af\';">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px; color: #9ca3af; transition: color 0.2s;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 013.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 07.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>
                            <span>Keluar</span>
                        </button>
                    </form>
                ')
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                fn (): string => Blade::render('
                    <script>
                        function clearTableCheckboxes() {
                            document.querySelectorAll("table input[type=\'checkbox\']").forEach(cb => {
                                cb.checked = false;
                                cb.dispatchEvent(new Event("change", { bubbles: true }));
                            });
                        }
                        window.addEventListener("pageshow", clearTableCheckboxes);
                        document.addEventListener("livewire:navigated", clearTableCheckboxes);
                    </script>
                ')
            )
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
