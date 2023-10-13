<?php

namespace App\Filament\Resources\TechnicalSystemResource\Pages;

use App\Filament\Resources\TechnicalSystemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechnicalSystem extends EditRecord
{
    protected static string $resource = TechnicalSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
