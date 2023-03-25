<?php

namespace App\Filament\Resources\SystemAlertResource\Pages;

use App\Filament\Resources\SystemAlertResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSystemAlerts extends ManageRecords
{
    protected static string $resource = SystemAlertResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
