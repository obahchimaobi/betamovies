<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Seasons;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SeasonsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SeasonsResource\RelationManagers;

class SeasonsResource extends Resource
{
    protected static ?string $model = Seasons::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    protected static ?string $activeNavigationIcon = 'heroicon-s-film';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('movieId')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('formatted_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('origin_country')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('season_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('episode_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('episode_title')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('overview')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('air_date')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('poster_path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('download_url')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('approved_at')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('origin_country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('season_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('episode_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('episode_title')
                    ->searchable(),
                ImageColumn::make('poster_path')
                    ->circular()
                    ->disk('uploads'),
                Tables\Columns\TextColumn::make('air_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                    }),
                Tables\Columns\TextColumn::make('download_url')
                    ->searchable()
                    ->limit(15),
                Tables\Columns\TextColumn::make('approved_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
                        // Fetch the Series using the series_id field
                        $series = \App\Models\Series::where('movieId', $record->movieId)->first(); // Assuming series_id is the foreign key
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
                    ->visible(fn($record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSeasons::route('/'),
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
        return static::getModel()::count();
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
