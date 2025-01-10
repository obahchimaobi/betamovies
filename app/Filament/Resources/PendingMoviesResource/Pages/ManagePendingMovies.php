<?php

namespace App\Filament\Resources\PendingMoviesResource\Pages;

use App\Filament\Resources\PendingMoviesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePendingMovies extends ManageRecords
{
    protected static string $resource = PendingMoviesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
