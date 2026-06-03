<?php

namespace App\Filament\Resources\Product\Pages;

use App\Filament\Resources\Product\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
