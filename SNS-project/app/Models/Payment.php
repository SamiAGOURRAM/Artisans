<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'Payments';
    protected $primaryKey = 'payment_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'artisan_id',
        'request_id',
        'quote_id',
        'payment_amount',
        'date_paid',
        'payment_method',
    ];

    // Define relationships with other models
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id');
    }
}

?>