<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vehiclecategory
 * @package App\Models
 * @version April 13, 2018, 11:36 am UTC
 */
class Vehiclecategory extends Model
{
    use SoftDeletes;

    public $table = 'vehiclecategories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'type',
        'desc',
        'is_enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'type' => 'string',
        'desc' => 'string',
        'is_enabled' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'type' => 'required',
        'desc' => '',
        'is_enabled' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pricegettings()
    {
        return $this->hasMany(\App\Models\Pricegetting::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pricepenalyties()
    {
        return $this->hasMany(\App\Models\Pricepenalyty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function repairs()
    {
        return $this->hasMany(\App\Models\Repair::class);
    }

    public function getFullnameAttribute($value)
    {
        return $this->code . ' - ' . $this->type;
    }
}
