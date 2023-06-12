<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'Availabilities';
    protected $primaryKey = 'availability_id';
    public $timestamps = false;

    protected $fillable = [
        'artisan_id',
        'date',
        'start_time',
        'end_time',
    ];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id');
    }
}
