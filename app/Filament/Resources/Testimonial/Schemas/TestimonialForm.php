<?php

namespace App\Filament\Resources\Testimonial\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')
                    ->label('Nama Klien')
                    ->required(),
                TextInput::make('client_role')
                    ->label('Pekerjaan / Jabatan')
                    ->placeholder('contoh: Pemilik Usaha, Pelanggan')
                    ->nullable(),
                Select::make('stars')
                    ->label('Bintang Penilaian')
                    ->options([
                        5 => '★★★★★ (5 Bintang)',
                        4 => '★★★★ (4 Bintang)',
                        3 => '★★★ (3 Bintang)',
                        2 => '★★ (2 Bintang)',
                        1 => '★ (1 Bintang)',
                    ])
                    ->default(5)
                    ->required(),
                Textarea::make('content')
                    ->label('Isi Testimoni')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
