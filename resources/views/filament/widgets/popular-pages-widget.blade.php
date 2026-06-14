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
                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap text-sm font-semibold text-gray-950 dark:text-white">
                                        Nama Halaman
                                    </span>
                                </th>
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap text-sm font-semibold text-gray-950 dark:text-white">
                                        Total Kunjungan (Views)
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                            @foreach($pages as $page)
                                <tr class="fi-ta-row transition duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                                    <td class="fi-ta-cell px-3 py-4 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                        <div class="flex items-center gap-x-2">
                                            <x-filament::icon
                                                :icon="$page['icon']"
                                                @class([
                                                    'h-5 w-5',
                                                    'text-primary-500' => $page['iconColor'] === 'primary',
                                                    'text-success-500' => $page['iconColor'] === 'success',
                                                    'text-warning-500' => $page['iconColor'] === 'warning',
                                                    'text-gray-400' => $page['iconColor'] === 'gray',
                                                ])
                                            />
                                            <span class="text-sm font-medium text-gray-950 dark:text-white">
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
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <x-filament::icon icon="heroicon-o-chart-bar" class="h-10 w-10 text-gray-400 dark:text-gray-500 mb-3" />
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Belum ada data kunjungan.</p>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
