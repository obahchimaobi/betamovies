<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUserDetails extends EditRecord
{
    protected static string $resource = UserResource::class;
}
