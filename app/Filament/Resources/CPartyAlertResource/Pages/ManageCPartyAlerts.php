<?php

namespace App\Filament\Resources\CPartyAlertResource\Pages;

use App\Filament\Resources\CPartyAlertResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCPartyAlerts extends ManageRecords
{
    protected static string $resource = CPartyAlertResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
