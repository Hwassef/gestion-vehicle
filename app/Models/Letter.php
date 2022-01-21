<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $collection = 'letters';
    /**
 * The attributes that are mass assignable.
 *
 * @var array<int, string>
 */
protected $fillable = [
    'letter_title',
    'letter_body',
    'client_id',
    'answered',
];
}
