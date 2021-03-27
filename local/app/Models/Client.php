<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Client",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fullname",
 *          description="fullname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cni",
 *          description="cni",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="passport",
 *          description="passport",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="num_license",
 *          description="num_license",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="attachment",
 *          description="attachment",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone1",
 *          description="phone1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone2",
 *          description="phone2",
 *          type="string"
 *      )
 * )
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fullname',
        'cni',
        'passport',
        'num_license',
        'attachment',
        'phone1',
        'phone2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fullname' => 'string',
        'cni' => 'string',
        'passport' => 'string',
        'num_license' => 'string',
        'attachment' => 'string',
        'phone1' => 'string',
        'phone2' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fullname' => 'required',
        'cni' => 'nullable',
        'passport' => 'nullable|unique:clients,passport',
        'num_license' => 'nullable|unique:clients,num_license',
        'attachment' => 'nullable',
        'phone1' => 'required',
        'phone2' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function complaints()
    {
        return $this->hasMany(\App\Models\Complaint::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function repairs()
    {
        return $this->hasMany(\App\Models\Repair::class);
    }

    public function getFullnamePhoneAttribute($value)
    {
        return $this->fullname . ' - ' . $this->phone1 . ' - ' . $this->phone2s;
    }
}
