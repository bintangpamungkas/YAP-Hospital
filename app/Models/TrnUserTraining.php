<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrnUserTraining extends Model
{
    protected $table = 'trn_user_training';
    protected $primaryKey = 'user_training_id';
    public $incrementing = false; // sesuaikan jika primary key tidak auto increment
    protected $keyType = 'string'; // sesuaikan tipe data jika diperlukan

    protected $fillable = [
        'user_training_id',
        'user_training_guid',
        'training_id',
        'user_id',
        'participation_status',
        'completion_date',
        'feedback',
        'sys_entry_user',
        'sys_entry_date',
        'sys_update_user',
        'sys_update_date',
        'sys_soft_delete',
        'sys_delete_user',
        'sys_delete_date',
        'sys_timestamp'
    ];

    public $timestamps = false;
}
