<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wrecker
 * @package App\Models
 * @version April 13, 2018, 11:37 am UTC
 */
class Wrecker extends Model
{
    use SoftDeletes;

    public $table = 'wreckers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'car_imm',
        'label',
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
        'car_imm' => 'string',
        'label' => 'string',
        'is_enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'car_imm' => 'required',
        'label' => '',
        'is_enabled' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function repairs()
    {
        return $this->hasMany(\App\Models\Repair::class);
    }

    public function getFullnameAttribute($value)
    {
        return $this->code . ' - ' . $this->car_imm;
    }
}
