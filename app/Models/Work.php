<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Work extends Model
{
    use HasFactory;

    public function passport_info() {
        return $this->belongsTo(Passport::class, 'passport_id', 'id');
    }

    public function visa_info() {
        return $this->belongsTo(Visa::class, 'visa_id', 'id');
    }

    public function country_info() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function agent_info() {
        return $this->belongsTo(Agents::class, 'agent_id', 'id');
    }

    public function agent_comission_paid($work_id, $agent_id) {
        $info = DB::table('expenses')->where(['work_id'=>$work_id, 'agent_id'=>$agent_id])->get();
        return $info;
    }

    public function client_expenses($work_id, $client_id) {
        $info = DB::table('expenses')->where(['work_id'=>$work_id, 'passport_id'=>$client_id])->get();
        return $info;
    }

    

    public function client_paid($work_id, $passport_id) {
        $info = DB::table('incomes')->where(['work_id'=>$work_id, 'passport_id'=>$passport_id])->get();
        return $info;
    }

    

    


    

    

    


}
