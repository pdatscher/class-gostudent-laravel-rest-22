<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AvailableDate extends Model


{
    use HasFactory;

    /**
     * define all properties that should be writeable
     * @var string[]
     */
    protected $fillable =['day', 'time', 'tutoring_offer_id', 'user_id'];

    /**
     * tutoring offer has many available dates
     */
    public function tutoring() : BelongsTo {
        return $this->belongsTo(TutoringOffer::class);
    }

    /*public function date() : BelongsTo {
        return $this->belongsTo(ScheduledTutoring::class);
    }*/

    public function bookedBy() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function date() : HasMany {
        return $this->belongsTo(ScheduledTutoring::class);
    }
}
