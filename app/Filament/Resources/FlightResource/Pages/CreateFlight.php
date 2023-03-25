<?php

namespace App\Filament\Resources\FlightResource\Pages;

use App\Filament\Resources\FlightResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFlight extends CreateRecord
{
    protected static string $resource = FlightResource::class;
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
