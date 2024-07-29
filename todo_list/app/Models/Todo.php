<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Step;

class Todo extends Authenticatable
{
    use HasFactory;
    protected $fillable=['title','completed','user_id','description'];

    public function steps() {
        return $this->hasMany(Step::class);
    }
}
