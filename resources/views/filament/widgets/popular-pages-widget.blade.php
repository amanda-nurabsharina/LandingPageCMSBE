<x-filament-widgets::widget>
    <x-filament::section :heading="$this->getHeading()">
        @php
            $pages = $this->getPageData();
        @endphp

        @if(count($pages) > 0)
            <div class="fi-ta">
                <div class="fi-ta-content overflow-x-auto">
                    <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                        <thead class="divide-y divide-gray-200 dark:divide-white/5">
                            <tr>
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group text-sm font-semibold text-gray-950 dark:text-white" style="display: inline-flex; align-items: center; gap: 4px; whitespace-nowrap: nowrap;">
                                        Nama Halaman
                                    </span>
                                </th>
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group text-sm font-semibold text-gray-950 dark:text-white" style="display: inline-flex; align-items: center; gap: 4px; whitespace-nowrap: nowrap;">
                                        Total Kunjungan (Views)
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                            @foreach($pages as $page)
                                <tr class="fi-ta-row transition duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                                    <td class="fi-ta-cell px-3 py-4 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <x-filament::icon
                                                :icon="$page['icon']"
                                                style="width: 20px; height: 20px; flex-shrink: 0; color: {{
                                                    $page['iconColor'] === 'primary' ? 'var(--primary-600, rgb(59, 130, 246))' : (
                                                    $page['iconColor'] === 'success' ? 'var(--success-600, rgb(16, 185, 129))' : (
                                                    $page['iconColor'] === 'warning' ? 'var(--warning-600, rgb(245, 158, 11))' : 'var(--gray-400, rgb(156, 163, 175))'
                                                    ))
                                                }};"
                                                @class([
                                                    'text-primary-500' => $page['iconColor'] === 'primary',
                                                    'text-success-500' => $page['iconColor'] === 'success',
                                                    'text-warning-500' => $page['iconColor'] === 'warning',
                                                    'text-gray-400' => $page['iconColor'] === 'gray',
                                                ])
                                            />
                                            <span class="text-sm font-medium text-gray-950 dark:text-white" style="line-height: 1;">
                                                {{ $page['name'] }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell px-3 py-4 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                        <x-filament::badge color="success">
                                            {{ number_format($page['views'], 0, ',', '.') }}
                                        </x-filament::badge>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-8 text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding-top: 2rem; padding-bottom: 2rem; text-align: center;">
                <x-filament::icon icon="heroicon-o-chart-bar" class="h-10 w-10 text-gray-400 dark:text-gray-500 mb-3" style="width: 40px; height: 40px; color: var(--gray-400, rgb(156, 163, 175)); margin-bottom: 12px;" />
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Belum ada data kunjungan.</p>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
