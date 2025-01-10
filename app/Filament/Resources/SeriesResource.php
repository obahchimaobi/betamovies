<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Series;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SeriesResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SeriesResource\RelationManagers;

class SeriesResource extends Resource
{
    protected static ?string $model = Series::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $activeNavigationIcon = 'heroicon-m-video-camera';

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
                Forms\Components\TextInput::make('poster_path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('backdrop_path')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('origin_country')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('language')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('overview')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('release_date')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('release_year')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('vote_count')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('runtime')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('genres')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('trailer_url')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('downloads')
                    ->required()
                    ->maxLength(255)
                    ->default(0),
                Forms\Components\TextInput::make('popularity')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DateTimePicker::make('approved_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->limit('15'),
            Tables\Columns\TextColumn::make('type')
                ->searchable(),
            Tables\Columns\TextColumn::make('language')
                ->searchable(),
            Tables\Columns\TextColumn::make('origin_country')
                ->searchable(),
            Tables\Columns\TextColumn::make('genres')
                ->searchable()
                ->limit('15'),
            ImageColumn::make('poster_path')
                ->circular()
                ->disk('images'),
            Tables\Columns\TextColumn::make('trailer_url')
                ->searchable()
                ->limit('10'),
            Tables\Columns\TextColumn::make('release_year')
                ->searchable(),
            Tables\Columns\TextColumn::make('vote_count')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                }),
            Tables\Columns\TextColumn::make('downloads')
                ->searchable(),
            Tables\Columns\TextColumn::make('popularity')
                ->searchable(),
            Tables\Columns\TextColumn::make('approved_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('deleted_at')
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
            'index' => Pages\ManageSeries::route('/'),
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
