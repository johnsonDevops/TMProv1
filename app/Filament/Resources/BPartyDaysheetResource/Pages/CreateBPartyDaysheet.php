<?php

namespace App\Filament\Resources\BPartyDaysheetResource\Pages;

use App\Filament\Resources\BPartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBPartyDaysheet extends CreateRecord
{
    protected static string $resource = BPartyDaysheetResource::class;
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
