<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'admission_number', 'stream_id', 'kcpe_marks', 
        'kcpe_grade', 'dob', 'join_date', 'join_level_id', 'password'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'join_date' => 'date',
        'dob' => 'date',
    ];
    
    
    /**
     * A relationship to the class level at which the student joined
     */
    public function joinLevel()
    {
        return $this->belongsTo(Level::class, 'join_level_id'); 
    }

    /**
     * A relationship to which the student currently is
     */
    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function joinClass() : string 
    {
        return $this->joinLevel->numeric . ' ' . $this->stream->letter;
    }
}
