<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pricegetting
 * @package App\Models
 * @version April 13, 2018, 12:06 pm UTC
 */
class Pricegetting extends Model
{
    use SoftDeletes;

    public $table = 'pricegettings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'vehiclecategory_id',
        'peopletype_id',
        'code',
        'price_day',
        'price_night',
        'per_kg'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vehiclecategory_id' => 'integer',
        'peopletype_id' => 'integer',
        'code' => 'string',
        'price_day' => 'integer',
        'price_night' => 'integer',
        'per_kg' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'code' => 'nullable',
        'per_kg' => 'nullable|boolean',
        'price_day' => 'required|numeric',
        'price_night' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function peopletype()
    {
        return $this->belongsTo(\App\Models\Peopletype::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vehiclecategory()
    {
        return $this->belongsTo(\App\Models\Vehiclecategory::class);
    }
}
