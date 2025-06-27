<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendingMoviesResource\Pages;
use App\Models\Movies;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class PendingMoviesResource extends Resource
{
    protected static ?string $model = Movies::class;

    // protected static ?string $navigationIcon = 'bi-hourglass';

    // protected static ?string $activeNavigationIcon = 'bi-hourglass-bottom';

    protected static ?string $pluralModelLabel = 'Pending movies';

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
            ->query(Movies::query()->where('status', false))
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->limit(length: '20'),
                Tables\Columns\TextColumn::make('release_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vote_count'),
                Tables\Columns\TextColumn::make('genres')
                    ->searchable()
                    ->limit('10'),
                ImageColumn::make('poster_path')
                    ->circular()
                    ->label('Images')
                    ->disk('images'),
                Tables\Columns\TextColumn::make('download_url')
                    ->limit(10),
                Tables\Columns\TextColumn::make('trailer_url')
                    ->limit(10),
                Tables\Columns\TextColumn::make('popularity')
                    ->searchable(),
                ToggleColumn::make('status')
                    ->label('Is Approved')
                    ->onIcon('heroicon-m-check-circle')
                    ->offIcon('heroicon-m-x-circle'),
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

                                TextInput::make('genres')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('release_year')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('runtime')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('trailer_url')
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

                                TextInput::make('vote_count')
                                    ->columnSpanFull(),

                                Textarea::make('overview')
                                    ->columnSpanFull(),
                            ]),
                    ]),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),

                \Filament\Tables\Actions\Action::make('movies')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-m-check-circle')
                    ->action(function ($record) {
                        $record->update([
                            'status' => true,
                            'approved_at' => Carbon::now(),
                        ]);

                        Notification::make()
                            ->title('Approval Successful')
                            ->success()
                            ->send();
                    })
                    ->visible(fn ($record) => $record->status === false),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),

                    BulkAction::make('approveMovies')
                        ->label('Approve')
                        ->color('success')
                        ->icon('heroicon-m-check-circle')
                        ->action(function (Collection $records) {
                            foreach ($records as $movie) {
                                $movie->update([
                                    'status' => true,
                                    'approved_at' => Carbon::now(),
                                ]);
                            }

                            Notification::make()
                                ->title('Movies Approved')
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
            'index' => Pages\ManagePendingMovies::route('/'),
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
        return static::getModel()::where('status', false)->count();
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
