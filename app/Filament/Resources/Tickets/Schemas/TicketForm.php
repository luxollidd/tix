<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('createdBy')
                    ->default(null),
                TextInput::make('createdByName')
                    ->default(null),
                TextInput::make('modifiedBy')
                    ->default(null),
                TextInput::make('modifiedByName')
                    ->default(null),
                Textarea::make('owner')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('web_app_server')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('email_cc')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('os_hidden_value')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('os')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('web_app_server_hidden_value')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('subject')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('project')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('pending_type')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('priority')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('problem_desc')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('tags')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('issue_type')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('db_hidden_value')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('database')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('ticket_no')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('organization_id')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('files')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('joget_version')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('status')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('deployment_method_hidden_value')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('deployment_method')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('email_bcc')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('reverse')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('dateCreated'),
                DateTimePicker::make('dateModified'),
            ]);
    }
}
