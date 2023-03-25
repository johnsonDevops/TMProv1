<?php

namespace App\Filament\Resources\APartyHotelResource\Pages;

use App\Filament\Resources\APartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAPartyHotels extends ListRecords
{
    protected static string $resource = APartyHotelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
