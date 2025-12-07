<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $fillable = ['client_id', 'score', 'commentaire'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

