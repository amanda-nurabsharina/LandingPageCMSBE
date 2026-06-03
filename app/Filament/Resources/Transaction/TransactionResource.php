<?php

namespace App\Filament\Resources\Transaction;

use App\Filament\Resources\Transaction\Pages\CreateTransaction;
use App\Filament\Resources\Transaction\Pages\EditTransaction;
use App\Filament\Resources\Transaction\Pages\ListTransactions;
use App\Filament\Resources\Transaction\Schemas\TransactionForm;
use App\Filament\Resources\Transaction\Tables\TransactionsTable;
use App\Models\Transaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $recordTitleAttribute = 'category';

    protected static ?string $navigationLabel = 'Pemasukan & Pengeluaran';

    protected static ?string $modelLabel = 'Transaksi Kas';

    protected static ?string $pluralModelLabel = 'Transaksi Kas';

    protected static string|\UnitEnum|null $navigationGroup = 'ERP & Keuangan';

    public static function form(Schema $schema): Schema
    {
        return TransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransactionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransactions::route('/'),
            'create' => CreateTransaction::route('/create'),
            'edit' => EditTransaction::route('/{record}/edit'),
        ];
    }
}
