<?php

namespace App\Filament\Resources\APartyDaysheetResource\Pages;

use App\Filament\Resources\APartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAPartyDaysheet extends CreateRecord
{
    protected static string $resource = APartyDaysheetResource::class;
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
