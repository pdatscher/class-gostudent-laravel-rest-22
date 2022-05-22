<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TutoringOffer extends Model
{
    use HasFactory;
    /**
     * define all properties that should be writeable
     * @var string[]
     */
    protected $fillable =['headline', 'subject', 'description', 'user_id'];

    /**
     * tutoring offer has many available dates
     */
    public function dates() : HasMany {
        return $this->hasMany(AvailableDate::class);
    }

    public function images() : HasMany {
        return $this->hasMany(Image::class);
    }

    /**
     * tutoring offer belongs to user (n:1)
     */
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}


