<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Series;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\BulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PendingSeriesResource\Pages;

class PendingSeriesResource extends Resource
{
    protected static ?string $model = Series::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Pending series';

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
            ->query(Series::query()->where('status', false))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('release_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vote_count')
                    ->searchable(),
                ImageColumn::make('poster_path')
                    ->circular()
                    ->label('Images')
                    ->disk('images'),
                Tables\Columns\TextColumn::make('genres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('popularity')
                    ->searchable(),
                ToggleColumn::make('status')
                    ->label('Is Approved')
                    ->onIcon('heroicon-m-check-circle')
                    ->offIcon('heroicon-m-x-circle'),
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

                                TextInput::make('genres')
                                    ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('vote_count')
                                    // ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('status')
                                    // ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('origin_country')
                                    // ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                TextInput::make('release_year')
                                    // ->disabled()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),

                                Textarea::make('overview')
                                    ->columnSpanFull(),
                                // ...
                            ]),
                    ]),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),

                Action::make('movies')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-m-check-circle')
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'approved',
                            'approved_at' => Carbon::now(),
                        ]);

                        Notification::make()
                            ->title('Approval Successful')
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),

                    BulkAction::make('approveSeries')
                        ->label('Approve')
                        ->color('success')
                        ->icon('heroicon-m-check-circle')
                        ->action(function (Collection $records) {
                            foreach ($records as $series) {
                                $series->update([
                                    'status' => 'approved',
                                    'approved_at' => Carbon::now(),
                                ]);
                            }

                            Notification::make()
                                ->title('Series Approved')
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
            'index' => Pages\ManagePendingSeries::route('/'),
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
