<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Peopletype
 * @package App\Models
 * @version April 13, 2018, 12:05 pm UTC
 */
class Peopletype extends Model
{
    use SoftDeletes;

    public $table = 'peopletypes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
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
        'label' => 'string',
        'is_enabled' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'label' => 'required',
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
}
