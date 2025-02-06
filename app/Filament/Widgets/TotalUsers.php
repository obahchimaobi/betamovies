<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalUsers extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Users', User::count())
                ->description('All users including admins')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->url(UserResource::getUrl()),

            Stat::make('Admins', User::where('is_admin', true)->count())
                ->description('Admins on the site')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Users', User::where('is_admin', false)->count())
                ->description('Normal users on the site')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
