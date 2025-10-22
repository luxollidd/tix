<?php

namespace App\Filament\Resources\Tickets\Schemas;

use App\Models\Ticket;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TicketInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('createdBy')
                    ->placeholder('-'),
                TextEntry::make('createdByName')
                    ->placeholder('-'),
                TextEntry::make('modifiedBy')
                    ->placeholder('-'),
                TextEntry::make('modifiedByName')
                    ->placeholder('-'),
                TextEntry::make('owner')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('web_app_server')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('email_cc')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('os_hidden_value')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('os')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('web_app_server_hidden_value')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('subject')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('project')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('pending_type')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('priority')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('problem_desc')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tags')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('issue_type')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('db_hidden_value')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('database')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('ticket_no')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('organization_id')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('files')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('joget_version')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deployment_method_hidden_value')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deployment_method')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('email_bcc')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('reverse')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('dateCreated')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('dateModified')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Ticket $record): bool => $record->trashed()),
            ]);
    }
}
