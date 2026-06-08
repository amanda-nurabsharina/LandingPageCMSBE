<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <style>
        /* Container & Trigger */
        .ip-container {
            position: relative;
            width: 100%;
        }

        .ip-trigger {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 10px 16px;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            cursor: pointer;
            text-align: left;
            transition: all 0.2s ease;
        }
        .ip-trigger:hover {
            border-color: #9ca3af;
            background-color: #f9fafb;
        }
        .ip-trigger:active {
            background-color: #f3f4f6;
        }

        .ip-trigger-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            color: #059669; /* emerald-600 */
            flex-shrink: 0;
        }
        .ip-trigger-icon svg {
            width: 18px !important;
            height: 18px !important;
            stroke: currentColor;
            stroke-width: 2px;
            fill: none;
        }

        .ip-trigger-label {
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }

        .ip-trigger-chevron {
            margin-left: auto;
            color: #9ca3af;
            display: flex;
            align-items: center;
        }
        .ip-trigger-chevron svg {
            width: 16px !important;
            height: 16px !important;
            fill: currentColor;
        }

        /* Modal Backdrop */
        .ip-modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            background-color: rgba(15, 23, 42, 0.6); /* slate-900 with opacity */
            backdrop-filter: blur(4px);
        }

        /* Modal Content Box */
        .ip-modal-content {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 650px;
            display: flex;
            flex-direction: column;
            max-height: 80vh;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        /* Header */
        .ip-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            border-bottom: 1px solid #f3f4f6;
            background-color: #ffffff;
        }
        .ip-modal-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }
        .ip-modal-close {
            background: transparent;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 6px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .ip-modal-close:hover {
            color: #4b5563;
            background-color: #f3f4f6;
        }
        .ip-modal-close svg {
            width: 20px !important;
            height: 20px !important;
            stroke: currentColor;
            stroke-width: 2;
        }

        /* Search Area */
        .ip-modal-search-wrapper {
            padding: 14px 24px;
            background-color: #f9fafb;
            border-bottom: 1px solid #f3f4f6;
        }
        .ip-search-relative {
            position: relative;
            width: 100%;
        }
        .ip-search-input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            color: #1f2937;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            outline: none;
            transition: border-color 0.2s;
        }
        .ip-search-input:focus {
            border-color: #059669; /* emerald-600 */
            box-shadow: 0 0 0 1px #059669;
        }
        .ip-search-icon {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
            display: flex;
            align-items: center;
        }
        .ip-search-icon svg {
            width: 18px !important;
            height: 18px !important;
            stroke: currentColor;
            stroke-width: 2;
        }

        /* Grid Wrapper */
        .ip-modal-grid-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 20px 24px;
            background-color: #fafbfb;
        }
        .ip-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(105px, 1fr));
            gap: 12px;
        }

        /* Grid Item Button */
        .ip-grid-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px 8px;
            background-color: #ffffff;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            gap: 6px;
            text-align: center;
        }
        .ip-grid-item:hover {
            border-color: #a7f3d0; /* emerald-200 */
            background-color: #f0fdf4; /* emerald-50 */
        }
        .ip-grid-item-active {
            border-color: #059669 !important; /* emerald-600 */
            background-color: #ecfdf5 !important; /* emerald-50 */
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            transform: scale(0.96);
        }

        .ip-grid-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4b5563;
        }
        .ip-grid-icon svg {
            width: 24px !important;
            height: 24px !important;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
        }
        .ip-grid-item-active .ip-grid-icon {
            color: #047857;
        }

        .ip-grid-label {
            font-size: 10px;
            font-weight: 600;
            line-height: 1.2;
            color: #6b7280;
            word-break: break-word;
            max-width: 100%;
        }
        .ip-grid-item-active .ip-grid-label {
            color: #065f46;
        }

        /* Footer */
        .ip-modal-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            padding: 16px 24px;
            background-color: #f9fafb;
            border-top: 1px solid #f3f4f6;
        }

        .ip-btn {
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            outline: none;
        }
        .ip-btn-cancel {
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            color: #374151;
        }
        .ip-btn-cancel:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
        }
        .ip-btn-save {
            background-color: #10b981; /* emerald-600 */
            color: #ffffff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .ip-btn-save:hover {
            background-color: #059669; /* emerald-700 */
        }
    </style>

    <div 
        x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            isOpen: false,
            search: '',
            selectedTemp: '',
            icons: {{ json_encode($getIcons()) }},
            init() {
                this.selectedTemp = this.state || '';
            },
            selectIcon(key) {
                this.selectedTemp = key;
            },
            saveIcon() {
                this.state = this.selectedTemp;
                this.isOpen = false;
            },
            cancelSelect() {
                this.selectedTemp = this.state || '';
                this.isOpen = false;
            }
        }"
        class="ip-container"
    >
        <!-- The trigger button displaying current icon -->
        <button
            type="button"
            x-on:click="isOpen = true; selectedTemp = state || ''; search = '';"
            class="ip-trigger"
        >
            <div class="ip-trigger-icon" x-html="icons[state] ? icons[state].svg : ''">
                <!-- SVG injected here -->
            </div>
            <span class="ip-trigger-label" x-text="icons[state] ? icons[state].label : 'Pilih Ikon...'"></span>
            <span class="ip-trigger-chevron">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Modal Dialog -->
        <div
            x-show="isOpen"
            x-cloak
            class="ip-modal-backdrop"
            style="display: none;"
        >
            <div
                x-on:click.away="cancelSelect()"
                class="ip-modal-content"
            >
                <!-- Header -->
                <div class="ip-modal-header">
                    <h3 class="ip-modal-title">Pilih Ikon</h3>
                    <button
                        type="button"
                        x-on:click="cancelSelect()"
                        class="ip-modal-close"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Search Input -->
                <div class="ip-modal-search-wrapper">
                    <div class="ip-search-relative">
                        <input
                            type="text"
                            x-model="search"
                            placeholder="Cari ikon..."
                            class="ip-search-input"
                        />
                        <div class="ip-search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Grid of Icons -->
                <div class="ip-modal-grid-wrapper">
                    <div class="ip-grid">
                        <template x-for="(icon, key) in icons" :key="key">
                            <button
                                type="button"
                                x-show="search === '' || icon.label.toLowerCase().includes(search.toLowerCase()) || key.toLowerCase().includes(search.toLowerCase())"
                                x-on:click="selectIcon(key)"
                                class="ip-grid-item"
                                :class="selectedTemp === key ? 'ip-grid-item-active' : ''"
                            >
                                <div class="ip-grid-icon" x-html="icon.svg"></div>
                                <span class="ip-grid-label" x-text="icon.label"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Footer -->
                <div class="ip-modal-footer">
                    <button
                        type="button"
                        x-on:click="cancelSelect()"
                        class="ip-btn ip-btn-cancel"
                    >
                        Batal
                    </button>
                    <button
                        type="button"
                        x-on:click="saveIcon()"
                        class="ip-btn ip-btn-save"
                    >
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>
