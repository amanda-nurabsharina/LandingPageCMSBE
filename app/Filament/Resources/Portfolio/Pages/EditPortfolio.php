<?php

namespace App\Filament\Resources\Portfolio\Pages;

use App\Filament\Resources\Portfolio\PortfolioResource;
use Filament\Resources\Pages\EditRecord;

class EditPortfolio extends EditRecord
{
    protected static string $resource = PortfolioResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
