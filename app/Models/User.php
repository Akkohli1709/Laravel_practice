<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Address;
class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    // build the relation one to many with 
    public function addresses(){
        return $this->hasMany(Address::class);
    } 

    // remove the timestamps from the table 
    public $timestamps = false;
    // enable the mass assignment 
    protected $guarded = [];
}
