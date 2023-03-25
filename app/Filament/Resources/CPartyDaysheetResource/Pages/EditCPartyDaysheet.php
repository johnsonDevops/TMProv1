<?php

namespace App\Filament\Resources\CPartyDaysheetResource\Pages;

use App\Filament\Resources\CPartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCPartyDaysheet extends EditRecord
{
    protected static string $resource = CPartyDaysheetResource::class;

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
