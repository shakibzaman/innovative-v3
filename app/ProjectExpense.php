<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectExpense extends Model
{
    use SoftDeletes;

    public $table = 'project_expenses';

    protected $dates = [
        'entry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'pro_id',
        'cat_id',
        'amount',
        'entry_date',
        'bank_name',
        'cheque',
        'note',
        'paid_by',
        'received_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function projectName()
    {
        return $this->belongsTo('App\Project','pro_id');
    }
    public function userName()
    {
        return $this->belongsTo('App\User','paid_by');
    }
    public function catName()
    {
        return $this->belongsTo('App\ProjectExpenseCategory','cat_id');
    }
}
