<?php

namespace App\Filament\Resources\PartyResource\Pages;

use App\Filament\Resources\PartyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageParties extends ManageRecords
{
    protected static string $resource = PartyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
