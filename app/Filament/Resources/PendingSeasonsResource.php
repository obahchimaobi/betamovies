<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendingSeasonsResource\Pages;
use App\Models\Seasons;
use App\Models\Series;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class PendingSeasonsResource extends Resource
{
    protected static ?string $model = Seasons::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Pending Seasons';

    protected static ?string $navigationGroup = 'Others';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Seasons::query()->where('status', 'pending'))
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('season_number'),
                Tables\Columns\TextColumn::make('episode_number'),
                Tables\Columns\TextColumn::make('episode_title'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                    }),
                Tables\Columns\TextColumn::make('download_url')
                    ->limit(20),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('approved_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form([
                        Section::make()
                            ->columns([
                                'sm' => 3,
                                'xl' => 6,
                                '2xl' => 8,
                            ])
                            ->schema([
                                TextInput::make('name')
                                    ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('season_number')
                                    ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('episode_number')
                                    ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('episode_title')
                                    // ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('status')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('download_url')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                Textarea::make('overview')
                                    ->columnSpanFull(),

                            ]),
                    ]),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),

                Action::make('seasons')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-m-check-circle')
                    ->action(function ($record) {
                        // Fetch the Series using the movieID field
                        $series = Series::where('movieId', $record->movieId)->first(); // Assuming movieId is the foreign key
                        // dd($series);

                        if ($series && $series->status == 'pending') {
                            // Approve the Series if not already approved
                            $series->update([
                                'status' => 'approved',
                                'approved_at' => Carbon::now(),
                            ]);

                            // Notify that the Series has been approved
                            Notification::make()
                                ->title('Series Approved')
                                ->success()
                                ->send();
                        }

                        // Approve the Season
                        $record->update([
                            'status' => 'approved',
                            'approved_at' => Carbon::now(),
                        ]);

                        // Notify about the Season approval
                        Notification::make()
                            ->title('Season Approved')
                            ->success()
                            ->send();
                    })
                    ->visible(fn ($record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),

                    BulkAction::make('approveSeasons')
                        ->label('Approve')
                        ->color('success')
                        ->icon('heroicon-m-check-circle')
                        ->action(function (Collection $records) {
                            foreach ($records as $season) {
                                // Fetch the Series using the movieID field
                                $series = Series::where('movieId', $season->movieId)->first();

                                if ($series && $series->status == 'pending') {
                                    // Approve the Series if not already approved
                                    $series->update([
                                        'status' => 'approved',
                                        'approved_at' => Carbon::now(),
                                    ]);

                                    // Notify that the Series has been approved
                                    Notification::make()
                                        ->title('Series Approved')
                                        ->success()
                                        ->send();
                                }

                                // Approve the Season
                                $season->update([
                                    'status' => 'approved',
                                    'approved_at' => Carbon::now(),
                                ]);
                            }

                            // Notify about the bulk approval
                            Notification::make()
                                ->title('Selected Seasons Approved')
                                ->success()
                                ->send();
                        })
                        ->requiresConfirmation(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePendingSeasons::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
