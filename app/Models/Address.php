<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Address extends Model
{
    use HasFactory;
    use softDeletes;
    // build the inverse relation to User table 
    public function users(){
        return $this->belongsTo(User::class);
    }

    // removing the timestamps from table 
    public $timestamps = false;

    // enable the mass assignment
    protected $guarded = [];

}
