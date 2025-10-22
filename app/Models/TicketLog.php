<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket_logs';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'dateCreated';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'dateModified';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'createdBy',
        'createdByName',
        'modifiedBy',
        'modifiedByName',
        'email_cc',
        'new_status',
        'orig_owner',
        'new_web_app_server',
        'orig_status',
        'new_priority',
        'email_bcc',
        'owner',
        'new_os_hidden_value',
        'changes',
        'status_group',
        'current_status',
        'new_issue_type',
        'pending_type',
        'new_web_app_server_hidden_value',
        'ticket_id',
        'new_database',
        'new_joget_version',
        'is_internal',
        'comment_from',
        'new_db_hidden_value',
        'new_project',
        'new_tags',
        'anchor',
        'new_os',
        'files',
        'comment',
        'database',
        'web_app_server',
        'os',
        'edit_tix_dets',
        'reply_template',
        'organization_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateCreated' => 'datetime',
        'dateModified' => 'datetime',
    ];
}
