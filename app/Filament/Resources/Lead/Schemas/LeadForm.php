<?php

namespace App\Filament\Resources\Lead\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Pengirim')
                    ->disabled(),
                TextInput::make('phone')
                    ->label('Nomor Telepon/WA')
                    ->disabled(),
                Textarea::make('message')
                    ->label('Pesan')
                    ->rows(5)
                    ->disabled()
                    ->columnSpanFull(),
            ]);
    }
}
