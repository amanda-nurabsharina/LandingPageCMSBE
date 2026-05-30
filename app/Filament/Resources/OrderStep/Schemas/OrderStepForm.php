<?php

namespace App\Filament\Resources\OrderStep\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderStepForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('step_number')
                    ->label('Step Number')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->placeholder('e.g. Konsultasi, Desain, Cetak')
                    ->required(),
                Textarea::make('description')
                    ->placeholder('Enter detailed instructions for this step...')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->placeholder('e.g. message-square, edit, printer, check')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
