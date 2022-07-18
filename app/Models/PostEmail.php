<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostEmail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'subscriber_id',
        'sent_at'
    ];

    protected $casts = [
        'post_id' => 'int',
        'subscriber_id' => 'int'
    ];

    protected $dates = [
        'sent_at'
    ];

    /**
     * @return BelongsTo
     */
    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }
}
