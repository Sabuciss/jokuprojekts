<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JokeResource\Pages;
use App\Filament\Resources\JokeResource\RelationManagers;
use App\Models\Joke;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JokeResource extends Resource
{
    protected static ?string $model = Joke::class;
    protected static ?string $navigationIcon = 'heroicon-o-face-smile';
    protected static ?string $navigationLabel = 'Joki';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('type')->required()->maxLength(50),
            Forms\Components\Textarea::make('setup')->required(),
            Forms\Components\Textarea::make('punchline')->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('type')->sortable(),
            Tables\Columns\TextColumn::make('setup')->limit(50),
            Tables\Columns\TextColumn::make('punchline')->limit(50),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ]);
    }

      public static function getPages(): array
    {
        return [
            'index' => Pages\ListJokes::route('/'),
            'create' => Pages\CreateJoke::route('/create'),
            'edit' => Pages\EditJoke::route('/{record}/edit'),
        ];
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }
}
