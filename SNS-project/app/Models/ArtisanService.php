<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanService extends Model
{
    protected $table = 'artisan_services';

    protected $primaryKey = ['artisan_id', 'service_id'];

    public $incrementing = false;

    protected $fillable = [
        'artisan_id',
        'service_id',
        'created_at',
        'updated_at'
    ];

    // Define the belongsTo relationship with the Artisan model
    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id');
    }

    // Define the belongsTo relationship with the Service model
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
