<?php

namespace App\Filament\Resources\UrlVisitResource\Pages;

use App\Filament\Resources\UrlVisitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUrlVisit extends EditRecord
{
    protected static string $resource = UrlVisitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
