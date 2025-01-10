<?php

namespace App\Filament\Resources\PendingSeasonsResource\Pages;

use App\Filament\Resources\PendingSeasonsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePendingSeasons extends ManageRecords
{
    protected static string $resource = PendingSeasonsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
