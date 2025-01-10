<?php

namespace App\Filament\Resources\PendingSeriesResource\Pages;

use App\Filament\Resources\PendingSeriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePendingSeries extends ManageRecords
{
    protected static string $resource = PendingSeriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
