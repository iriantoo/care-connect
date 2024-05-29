<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date_of_incident',
        'time_of_incident',
        'picture',
        'is_anonymous',
        'is_confirmed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
