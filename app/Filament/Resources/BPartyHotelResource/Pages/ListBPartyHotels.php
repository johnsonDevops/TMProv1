<?php

namespace App\Filament\Resources\BPartyHotelResource\Pages;

use App\Filament\Resources\BPartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBPartyHotels extends ListRecords
{
    protected static string $resource = BPartyHotelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
