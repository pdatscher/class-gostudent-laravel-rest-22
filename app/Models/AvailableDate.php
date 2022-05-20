<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AvailableDate extends Model


{
    use HasFactory;

    /**
     * define all properties that should be writeable
     * @var string[]
     */
    protected $fillable =['date', 'time', 'user_id'];
}
