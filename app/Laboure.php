<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboure extends Model
{
    public function labourer(){
        return $this->hasMany(ProjectExpense::class,'received_by');
    }
}
