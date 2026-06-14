<?php

namespace App\Filament\Resources\Activity\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Aktifitas')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('thumbnail')
                    ->label('Gambar Thumbnail')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240)
                    ->directory('activities-thumbnails')
                    ->disk('public')
                    ->required(),
                RichEditor::make('description')
                    ->label('Konten Aktifitas')
                    ->fileAttachmentsDirectory('activities-content-images')
                    ->fileAttachmentsDisk('public')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
