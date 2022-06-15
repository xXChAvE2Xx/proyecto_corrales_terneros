<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Breeding;

class Supplier extends Model
{
    use HasFactory;

    public function todos(){
        return $this->hasMany(Breeding::class);
    } 

}
