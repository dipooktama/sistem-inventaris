<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceActivity extends Model
{
    //use HasFactory;
    protected $table = 'device_activity';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'device_uuid',
        'activities',
        'hasil',
    ];
}
