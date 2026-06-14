<x-filament-widgets::widget>
    <x-filament::section heading="Halaman Terpopuler" icon="heroicon-o-chart-bar">
        @php
            $pages = $this->getPageData();
        @endphp

        @if(count($pages) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left py-2 px-3 font-semibold text-gray-600 dark:text-gray-400">Nama Halaman</th>
                            <th class="text-right py-2 px-3 font-semibold text-gray-600 dark:text-gray-400">Total Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <td class="py-2 px-3 text-gray-900 dark:text-gray-100">
                                    {{ $page['name'] }}
                                </td>
                                <td class="py-2 px-3 text-right">
                                    <span class="inline-flex items-center rounded-full bg-success-50 dark:bg-success-400/10 px-2 py-1 text-xs font-medium text-success-700 dark:text-success-400 ring-1 ring-inset ring-success-600/20">
                                        {{ $page['views'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">Belum ada data kunjungan.</p>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
