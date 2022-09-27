<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerTransaction extends Model
{
    use HasFactory;

    public function owners_info() {
        return $this->belongsTo(Owners::class, 'owner_id', 'id');
    }

}
