<?php

namespace App\Filament\Resources\APartyHotelResource\Pages;

use App\Filament\Resources\APartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAPartyHotel extends CreateRecord
{
    protected static string $resource = APartyHotelResource::class;
    
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
