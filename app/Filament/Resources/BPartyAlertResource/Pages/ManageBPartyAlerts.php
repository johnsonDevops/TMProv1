<?php

namespace App\Filament\Resources\BPartyAlertResource\Pages;

use App\Filament\Resources\BPartyAlertResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBPartyAlerts extends ManageRecords
{
    protected static string $resource = BPartyAlertResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
