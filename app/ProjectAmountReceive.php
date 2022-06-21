<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAmountReceive extends Model
{
    public function contractor()
    {
        return $this->belongsTo(Contracter::class,'paid_by','id');
    }
    public function projectName()
    {
        return $this->belongsTo(Project::class,'pro_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'received','id');
    }
}
