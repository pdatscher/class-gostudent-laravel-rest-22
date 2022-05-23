<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledTutoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tutoring_offer_id',
        'available_date_date', 'available_date_time'
    ];

    public function tutoring() : BelongsTo {
        return $this->belongsTo(TutoringOffer::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function date() : HasOne {
        return $this->hasOne(AvailableDate::class);
    }

}
