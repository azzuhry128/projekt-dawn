<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Accounts extends Model
{
    use HasFactory;
    use Notifiable;
    use HasUuids;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}
