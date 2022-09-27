<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Facades\Agent;

class Expenses extends Model
{
    use HasFactory;

    public function category_info() {
        return $this->belongsTo(ExpensesCategory::class, 'expenses_category_id', 'id');
    }

    public function work_info() {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function agent_info() {
        return $this->belongsTo(Agents::class, 'agent_id', 'id');
    }

    public function passport_info() {
        return $this->belongsTo(Passport::class, 'passport_id', 'id');
    }

    

    


}
