<?php

namespace App\Filament\Resources\BPartyDaysheetResource\Pages;

use App\Filament\Resources\BPartyDaysheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBPartyDaysheet extends EditRecord
{
    protected static string $resource = BPartyDaysheetResource::class;

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
