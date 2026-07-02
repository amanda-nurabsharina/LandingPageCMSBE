<?php

namespace App\Filament\Resources\Lead;

use App\Filament\Resources\Lead\Pages\EditLead;
use App\Filament\Resources\Lead\Pages\ListLeads;
use App\Filament\Resources\Lead\Schemas\LeadForm;
use App\Filament\Resources\Lead\Tables\LeadsTable;
use App\Models\Lead;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Leads / Pesan';

    protected static ?string $modelLabel = 'Lead';

    protected static ?string $pluralModelLabel = 'Leads / Pesan Masuk';

    protected static string|\UnitEnum|null $navigationGroup = null;

    protected static ?int $navigationSort = 12;

    public static function form(Schema $schema): Schema
    {
        return LeadForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeadsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLeads::route('/'),
            'edit' => EditLead::route('/{record}/edit'), // Dipetakan ke halaman edit (tampilan readonly)
        ];
    }
}
