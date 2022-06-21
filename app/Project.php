<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    public $table = 'projects';
//    use SoftDeletes, MultiTenantModelTrait;
    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'name',
        'contract',
        'start_date',
        'end_date',
        'appr_amount',
        'cost_amount',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function expense(){
        return $this->hasMany(ProjectExpense::class,'pro_id');
    }
    public function received(){
        return $this->hasMany(ProjectAmountReceive::class,'pro_id');
    }

}
