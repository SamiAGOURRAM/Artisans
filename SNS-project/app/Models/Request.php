<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'Requests';
    protected $primaryKey = 'request_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'service_id',
        'description',
        'date_requested',
        'status',
        'location',
    ];

    // Define relationships with other models
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class, 'request_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'request_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'request_id');
    }
}

?>