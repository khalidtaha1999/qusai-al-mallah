<?php

namespace App\Filament\Resources\OurCustomersResource\Pages;

use App\Filament\Resources\OurCustomersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurCustomers extends EditRecord
{
    protected static string $resource = OurCustomersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
