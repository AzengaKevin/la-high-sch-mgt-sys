<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;    
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name',
       'email',
       'password',
       'tsc_number',
       'union',
       'phone',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'remember_token',
   ];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = [
       'email_verified_at' => 'datetime',
       'phone_verified_at' => 'datetime',
   ];

   /**
    * A function containing the array of unions
    * @return array
    */
   public static function unions() : array
   {
       return array('knut', 'kuppet');
   }

   /**
    * Teacher subject relationship method
    */
   public function subjects()
   {
        return $this->belongsToMany(Subject::class);
   }
}
