<?php

namespace App\Filament\Resources\LocalContactResource\Pages;

use App\Filament\Resources\LocalContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocalContact extends EditRecord
{
    protected static string $resource = LocalContactResource::class;

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
