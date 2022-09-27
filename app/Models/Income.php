<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    public function passport_info() {
        return $this->belongsTo(Passport::class, 'passport_id', 'id');
    }

    public function work_info() {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }


}
