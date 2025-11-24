<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    // satu role ini akan bisa punya banyak user
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
