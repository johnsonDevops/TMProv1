<?php

namespace App\Filament\Resources\APartyDaysheetResource\Pages;

use App\Filament\Resources\APartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAPartyDaysheets extends ListRecords
{
    protected static string $resource = APartyDaysheetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
