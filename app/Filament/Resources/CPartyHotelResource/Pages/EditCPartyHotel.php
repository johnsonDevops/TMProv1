<?php

namespace App\Filament\Resources\CPartyHotelResource\Pages;

use App\Filament\Resources\CPartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCPartyHotel extends EditRecord
{
    protected static string $resource = CPartyHotelResource::class;

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
