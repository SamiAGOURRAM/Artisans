<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'Messages';
    protected $primaryKey = 'message_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'artisan_id',
        'request_id',
        'message_text',
        'date_sent',
        'sender',
    ];

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

    public function sender()
    {
        if ($this->sender === 'user') {
            return $this->belongsTo(User::class, 'user_id');
        } else {
            return $this->belongsTo(Artisan::class, 'artisan_id');
        }
    }

    public function receiver()
    {
        if ($this->sender === 'user') {
            return $this->belongsTo(Artisan::class, 'artisan_id');
        } else {
            return $this->belongsTo(User::class, 'user_id');
        }
    }
}

?>