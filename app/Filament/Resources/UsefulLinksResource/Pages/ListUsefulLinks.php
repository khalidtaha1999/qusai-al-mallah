<?php

namespace App\Filament\Resources\UsefulLinksResource\Pages;

use App\Filament\Resources\UsefulLinksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsefulLinks extends ListRecords
{
    protected static string $resource = UsefulLinksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
