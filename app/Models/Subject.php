<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'department_id', 'description'];

    /**
     * Subject Department Relationship
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function streams()
    {
        return $this->belongsToMany(Stream::class);
    }
}
