<?php

namespace App\Filament\Resources\LocalContactResource\Pages;

use App\Filament\Resources\LocalContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocalContacts extends ListRecords
{
    protected static string $resource = LocalContactResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
