<?php

namespace App\Filament\Resources\CPartyDaysheetResource\Pages;

use App\Filament\Resources\CPartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCPartyDaysheets extends ListRecords
{
    protected static string $resource = CPartyDaysheetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
