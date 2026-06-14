<x-filament-widgets::widget>
    <x-filament::section heading="Halaman Terpopuler" icon="heroicon-o-chart-bar">
        @php
            $pages = $this->getPageData();
        @endphp

        @if(count($pages) > 0)
            <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-white/10">
                <table class="w-full divide-y divide-gray-200 dark:divide-white/10">
                    <thead class="bg-gray-50 dark:bg-white/5">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Nama Halaman
                            </th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Total Kunjungan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-white/5 bg-white dark:bg-gray-900">
                        @foreach($pages as $page)
                            <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        @if($page['icon'])
                                            <x-filament::icon
                                                :icon="$page['icon']"
                                                class="h-5 w-5"
                                                :style="'color: ' . $page['iconColor']"
                                            />
                                        @endif
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $page['name'] }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <span class="inline-flex items-center justify-center rounded-md bg-success-50 dark:bg-success-400/10 px-2.5 py-1 text-xs font-semibold text-success-600 dark:text-success-400 ring-1 ring-inset ring-success-500/20">
                                        {{ $page['views'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <x-filament::icon icon="heroicon-o-chart-bar" class="h-10 w-10 text-gray-400 dark:text-gray-500 mb-3" />
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Belum ada data kunjungan.</p>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
