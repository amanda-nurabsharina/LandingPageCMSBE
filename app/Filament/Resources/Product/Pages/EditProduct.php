<?php

namespace App\Filament\Resources\Product\Pages;

use App\Filament\Resources\Product\ProductResource;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
}
