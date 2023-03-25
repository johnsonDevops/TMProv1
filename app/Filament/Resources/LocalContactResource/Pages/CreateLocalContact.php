<?php

namespace App\Filament\Resources\LocalContactResource\Pages;

use App\Filament\Resources\LocalContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLocalContact extends CreateRecord
{
    protected static string $resource = LocalContactResource::class;
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
