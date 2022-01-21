<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class AnsweredLetter extends Model
{
    use HasFactory;
    protected $collection = 'answered_letters';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'letter_body',
        'letter_id',
    ];
}
