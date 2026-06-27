<?php

namespace App\Filament\Resources\WorkStep\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class WorkStepForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Langkah')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi Langkah')
                    ->nullable()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Ilustrasi Lingkaran (Circular Illustration)')
                    ->image()
                    ->directory('work_steps')
                    ->disk('public')
                    ->nullable(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
