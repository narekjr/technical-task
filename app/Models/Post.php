<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Post extends Model
{
    protected $fillable = [
        'website_id',
        'content',
        'status'
    ];

    protected $casts = [
        'website_id' => 'int',
        'status' => 'int'
    ];

    /**
     * @return HasManyThrough
     */
    public function subscribers(): HasManyThrough
    {
        return $this->hasManyThrough(Subscriber::class, Website::class, 'id', localKey: 'website_id');
    }

    /**
     * @return HasMany
     */
    public function postEmails(): HasMany
    {
        return $this->hasMany(PostEmail::class);
    }

    /**
     * @return BelongsTo
     */
    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
