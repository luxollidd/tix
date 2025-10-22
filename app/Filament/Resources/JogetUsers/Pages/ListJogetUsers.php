<?php

namespace App\Filament\Resources\JogetUsers\Pages;

use App\Filament\Resources\JogetUsers\JogetUserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJogetUsers extends ListRecords
{
    protected static string $resource = JogetUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
