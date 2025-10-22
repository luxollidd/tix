<?php
// app/Models/JogetUser.php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class JogetUser extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    // --- Configuration for String Primary Key ---

    /**
     * The table associated with the model.
     * By convention, Laravel would look for 'joget_users', so this is not
     * strictly necessary but is good for clarity.
     *
     * @var string
     */
    protected $table = 'joget_users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID. We set this to string.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * We set this to false because our ID is a string like "admin".
     *
     * @var bool
     */
    public $incrementing = false;

    // --- Standard Model Properties ---

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'is_active',
        'timezone',
        'locale',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Automatically hashes passwords
            'is_active' => 'boolean', // Casts '1'/'0' to true/false
        ];
    }
}