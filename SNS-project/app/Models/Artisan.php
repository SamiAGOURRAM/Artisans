<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    protected $table = 'Artisans';
    protected $primaryKey = 'artisan_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_address',
        'description',
        'profile_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'Artisan_Services', 'artisan_id', 'service_id');
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class, 'artisan_id');
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class, 'artisan_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'artisan_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'artisan_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'artisan_id');
    }
}
