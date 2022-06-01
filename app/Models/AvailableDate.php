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
    public function tutoringOffer() : BelongsTo {
        return $this->belongsTo(TutoringOffer::class);
    }


    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }



}
