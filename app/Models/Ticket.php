<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * It's assumed the table name is 'tickets'. If it's different,
     * you should update this value.
     *
     * @var string
     */
    protected $table = 'tickets'; // <-- UPDATE THIS IF YOUR TABLE NAME IS DIFFERENT

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     * The schema shows the 'id' is a varchar, so we disable auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     * Set to 'string' because the primary key is a varchar.
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
        'owner',
        'web_app_server',
        'email_cc',
        'os_hidden_value',
        'os',
        'web_app_server_hidden_value',
        'subject',
        'project',
        'pending_type',
        'priority',
        'problem_desc',
        'tags',
        'issue_type',
        'db_hidden_value',
        'database',
        'ticket_no',
        'organization_id',
        'files',
        'joget_version',
        'status',
        'deployment_method_hidden_value',
        'deployment_method',
        'email_bcc',
        'reverse',
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