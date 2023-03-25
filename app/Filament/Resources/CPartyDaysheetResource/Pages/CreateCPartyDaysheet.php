<?php

namespace App\Filament\Resources\CPartyDaysheetResource\Pages;

use App\Filament\Resources\CPartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCPartyDaysheet extends CreateRecord
{
    protected static string $resource = CPartyDaysheetResource::class;
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
