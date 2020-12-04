<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    //['mathemetics', 'languages', 'science', 'industrial', 'humanities', 'religious']

    protected $fillable = ['name', 'description'];
}
