<?php

namespace App\Filament\Resources\JogetUsers\Pages;

use App\Filament\Resources\JogetUsers\JogetUserResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditJogetUser extends EditRecord
{
    protected static string $resource = JogetUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
