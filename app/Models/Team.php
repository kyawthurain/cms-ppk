<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;

    //use SoftDeletes;
    protected $fillable = ['name','email','phone','role_id','depatment_id'];

    public function department()
    {
        return $this->belongsTo(Depatment::class,"depatment_id");
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
