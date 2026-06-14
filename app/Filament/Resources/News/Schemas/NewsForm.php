<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Berita')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('thumbnail')
                    ->label('Gambar Thumbnail')
                    ->image()
                    ->directory('news-thumbnails')
                    ->disk('public')
                    ->required(),
                RichEditor::make('description')
                    ->label('Konten Berita')
                    ->fileAttachmentsDirectory('news-content-images')
                    ->fileAttachmentsDisk('public')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
