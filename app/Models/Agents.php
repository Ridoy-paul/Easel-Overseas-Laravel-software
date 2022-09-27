<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    use HasFactory;


    public function agent_passports() {
        return $this->hasMany(Work::class, 'agent_id', 'id');
    }


}
