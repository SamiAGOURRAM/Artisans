<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'Quotes';
    protected $primaryKey = 'quote_id';
    public $timestamps = false;

    protected $fillable = [
        'artisan_id',
        'request_id',
        'quote_amount',
        'quote_description',
        'date_quoted',
        'status',
    ];

    // Define relationships with other models
    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'quote_id');
    }
}

?>