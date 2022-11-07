<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable=['name','city', 'address','work_hours'];


    public function dishes(){
        return $this->hasMany(Dish::class);
        }
}
