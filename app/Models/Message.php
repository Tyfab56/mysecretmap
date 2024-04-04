<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model

{
    protected $fillable = ['from_id', 'to_id', 'subject', 'body', 'read_at'];

    // Relation avec l'utilisateur qui envoie le message
    public function sender()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    // Relation avec l'utilisateur qui reçoit le message
    public function recipient()
    {
        return $this->belongsTo(User::class, 'to_id');
    }

    protected $casts = [
        'read_at' => 'datetime',
    ];
}
