<?php

namespace App\Filament\Resources\JogetUsers\Pages;

use App\Filament\Resources\JogetUsers\JogetUserResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewJogetUser extends ViewRecord
{
    protected static string $resource = JogetUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
