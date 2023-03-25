<?php

namespace App\Filament\Resources\APartyHotelResource\Pages;

use App\Filament\Resources\APartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAPartyHotel extends EditRecord
{
    protected static string $resource = APartyHotelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
