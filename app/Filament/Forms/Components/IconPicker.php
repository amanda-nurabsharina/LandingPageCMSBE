<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class IconPicker extends Field
{
    protected string $view = 'filament.forms.components.icon-picker';

    public function getIcons(): array
    {
        return \App\Filament\Resources\IconList::getRaw();
    }
}
