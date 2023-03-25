<?php

namespace App\Filament\Resources\BPartyHotelResource\Pages;

use App\Filament\Resources\BPartyHotelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBPartyHotel extends EditRecord
{
    protected static string $resource = BPartyHotelResource::class;

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
