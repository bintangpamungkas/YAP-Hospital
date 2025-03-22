<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstTraining extends Model
{
    protected $table = 'mst_training';
    protected $primaryKey = 'training_id';
    public $incrementing = false; // sesuaikan jika primary key tidak auto increment
    protected $keyType = 'string'; // sesuaikan tipe data jika diperlukan

    protected $fillable = [
        'training_id',
        'training_guid',
        'training_code',
        'training_name',
        'training_description',
        'training_category',
        'training_duration',
        'training_level',
        'training_provider',
        'training_cost',
        'training_start_date',
        'training_end_date',
        'training_location',
        'training_capacity',
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
