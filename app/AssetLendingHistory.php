<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetLendingHistory extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "asset_id",
        "employee_id",
        "date_given",
        "return_date",
        "date_of_return",
        "notes"
    ];


    //region Relations
    public function employee(){
        return $this->hasOne(Employee::class,"id","employee_id");
    }

    public function asset(){
        return $this->belongsTo(Asset::class,'asset_id','id');
    }

    //endregion
}
