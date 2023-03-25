<?php

namespace App\Filament\Resources\CPartyHotelResource\Pages;

use App\Filament\Resources\CPartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCPartyHotel extends CreateRecord
{
    protected static string $resource = CPartyHotelResource::class;

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
