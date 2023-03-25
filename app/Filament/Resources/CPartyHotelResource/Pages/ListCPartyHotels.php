<?php

namespace App\Filament\Resources\CPartyHotelResource\Pages;

use App\Filament\Resources\CPartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCPartyHotels extends ListRecords
{
    protected static string $resource = CPartyHotelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
