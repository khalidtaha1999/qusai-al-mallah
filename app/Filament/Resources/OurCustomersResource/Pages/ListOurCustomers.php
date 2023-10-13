<?php

namespace App\Filament\Resources\OurCustomersResource\Pages;

use App\Filament\Resources\OurCustomersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurCustomers extends ListRecords
{
    protected static string $resource = OurCustomersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
