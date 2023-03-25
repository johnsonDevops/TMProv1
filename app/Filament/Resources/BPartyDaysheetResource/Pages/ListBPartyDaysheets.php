<?php

namespace App\Filament\Resources\BPartyDaysheetResource\Pages;

use App\Filament\Resources\BPartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBPartyDaysheets extends ListRecords
{
    protected static string $resource = BPartyDaysheetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
