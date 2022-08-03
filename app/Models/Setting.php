<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const BOOKINGS = 'Bookings';
    const MAINTENANCE_MODE = 'Maintenance Mode';

    protected $fillable = ['key', 'name'];
}
