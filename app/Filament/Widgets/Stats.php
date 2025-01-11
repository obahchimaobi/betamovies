<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Movies;
use App\Models\Series;
use App\Models\Comment;
use Laravel\Pulse\Users;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\MoviesResource;
use App\Filament\Resources\SeriesResource;
use App\Filament\Resources\CommentResource;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Movies', Movies::count())
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->url(MoviesResource::getUrl())
            ->chart([7, 2, 10, 3, 15, 4, 17]),

        Stat::make('Total Series', Series::count())
            ->description('12k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('warning')
            ->url(SeriesResource::getUrl())
            ->chart([3, 2, 4, 3, 7, 4, 10]),

        Stat::make('Total Comments', Comment::count())
            ->description('1k Decrease')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger')
            ->url(CommentResource::getUrl())
            ->chart([1, 1, 4, 3, 15, 1]),
        ];
    }
}
