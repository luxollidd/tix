<?php

namespace App\Filament\Resources\JogetUsers;

use App\Filament\Resources\JogetUsers\Pages\CreateJogetUser;
use App\Filament\Resources\JogetUsers\Pages\EditJogetUser;
use App\Filament\Resources\JogetUsers\Pages\ListJogetUsers;
use App\Filament\Resources\JogetUsers\Schemas\JogetUserForm;
use App\Filament\Resources\JogetUsers\Tables\JogetUsersTable;
use App\Models\JogetUser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JogetUserResource extends Resource
{
    protected static ?string $model = JogetUser::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return JogetUserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JogetUsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJogetUsers::route('/'),
            'create' => CreateJogetUser::route('/create'),
            'edit' => EditJogetUser::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
