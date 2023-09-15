<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceActivity extends Model
{
    use HasFactory;
    protected $table = 'device_activity';
    protected $fillable = [
        'device_uuid',
        'activities',
        'minutes',
        'time_category',
        'total_minutes_in_year',
    ];
}
