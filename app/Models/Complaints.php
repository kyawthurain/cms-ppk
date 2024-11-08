<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaints extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','anonymous','email','phone','category_id','role_id','depatment_id','title','description','files'];

    public function department()
    {
        return $this->belongsTo(Depatment::class,"depatment_id");
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    

}
