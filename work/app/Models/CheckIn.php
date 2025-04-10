<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'clock_in_time',
        'clock_out_time',
        'check_in_11',
        'check_in_13',
        'check_in_16',
        'check_in_11_status',
        'check_in_13_status',
        'check_in_16_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}