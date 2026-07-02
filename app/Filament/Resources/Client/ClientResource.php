<?php

namespace App\Filament\Resources\Client;

use App\Filament\Resources\Client\Pages\CreateClient;
use App\Filament\Resources\Client\Pages\EditClient;
use App\Filament\Resources\Client\Pages\ListClients;
use App\Filament\Resources\Client\Schemas\ClientForm;
use App\Filament\Resources\Client\Tables\ClientsTable;
use App\Models\Client;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Logo Klien / Perusahaan';

    protected static ?string $modelLabel = 'Klien';

    protected static ?string $pluralModelLabel = 'Klien Kami / Perusahaan';

    protected static string|\UnitEnum|null $navigationGroup = 'Testimoni & Klien';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ClientForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClientsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClients::route('/'),
            'create' => CreateClient::route('/create'),
            'edit' => EditClient::route('/{record}/edit'),
        ];
    }
}
