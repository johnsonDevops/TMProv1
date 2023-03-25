<?php

namespace App\Filament\Resources\APartyAlertResource\Pages;

use App\Filament\Resources\APartyAlertResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAPartyAlerts extends ManageRecords
{
    protected static string $resource = APartyAlertResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
