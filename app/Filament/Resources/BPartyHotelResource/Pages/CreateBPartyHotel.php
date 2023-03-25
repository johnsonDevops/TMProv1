<?php

namespace App\Filament\Resources\BPartyHotelResource\Pages;

use App\Filament\Resources\BPartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBPartyHotel extends CreateRecord
{
    protected static string $resource = BPartyHotelResource::class;

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
