<?php

namespace App\Filament\Resources\JogetUsers\Pages;

use App\Filament\Resources\JogetUsers\JogetUserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJogetUser extends CreateRecord
{
    protected static string $resource = JogetUserResource::class;
}
