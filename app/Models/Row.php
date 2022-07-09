<?php

namespace App\Models;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    use BroadcastsEvents;

    protected $fillable = ['name', 'date'];

    protected $casts = [
        'date' => 'date:d.m.Y',
    ];

    /**
     * Get the channels that model events should broadcast on.
     *
     * @param  string  $event
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => new Channel('App.Models.Row'),
            default => [],
        };
    }
}
