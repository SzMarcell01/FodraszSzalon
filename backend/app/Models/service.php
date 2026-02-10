<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class service extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'name',
        'time',
    ];

    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
