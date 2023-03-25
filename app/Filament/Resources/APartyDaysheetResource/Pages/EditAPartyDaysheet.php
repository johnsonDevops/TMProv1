<?php

namespace App\Filament\Resources\APartyDaysheetResource\Pages;

use App\Filament\Resources\APartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAPartyDaysheet extends EditRecord
{
    protected static string $resource = APartyDaysheetResource::class;

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
