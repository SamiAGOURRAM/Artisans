<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'Services';
    protected $primaryKey = 'service_id';
    public $timestamps = false;

    protected $fillable = [
        'service_name',
        'service_description',
    ];

    public function artisans()
    {
        return $this->belongsToMany(Artisan::class, 'Artisan_Services', 'service_id', 'artisan_id');
    }
}
