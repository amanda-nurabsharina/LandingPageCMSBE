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
                    ->required(),
                TextInput::make('client_role')
                    ->placeholder('e.g. CEO of Company, Customer')
                    ->nullable(),
                Select::make('stars')
                    ->options([
                        5 => '★★★★★ (5 Stars)',
                        4 => '★★★★ (4 Stars)',
                        3 => '★★★ (3 Stars)',
                        2 => '★★ (2 Stars)',
                        1 => '★ (1 Star)',
                    ])
                    ->default(5)
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
