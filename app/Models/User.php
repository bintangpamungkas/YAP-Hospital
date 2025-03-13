<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    // Disable Laravel's default timestamps (if not using created_at/updated_at)
    public $timestamps = false;
    
    protected $fillable = [
        'user_name',
        'user_prefix_title',
        'user_suffix_title',
        'user_nik',
        'user_last_education',
        'user_nip',
        'user_npwp',
        'user_birth_place',
        'user_birth_date',
        'user_religion',
        'user_rank',
        'user_position',
        'user_institution',
        'user_office_phone',
        'user_home_address',
        'user_username',
        'user_phone_number',
        'user_email',
        'user_password',
        'user_level',
        'user_profile_picture',
        'user_gender',
        'user_employment_type',
        'user_is_active',
        'user_last_login',
        'sys_entry_user',
        'sys_entry_date',
        'sys_update_user',
        'sys_update_date',
        'sys_soft_delete',
        'sys_delete_user',
        'sys_delete_date',
        'sys_timestamp',
    ];
    
    protected $hidden = [
        'user_password',
        // ...other sensitive fields as needed...
    ];

    protected $dates = [
        'user_birth_date',
        'user_last_login',
        'sys_entry_date',
        'sys_update_date',
        'sys_delete_date',
        'sys_timestamp',
    ];
}
