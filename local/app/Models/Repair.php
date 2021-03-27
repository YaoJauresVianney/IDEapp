<?php

namespace App\Models;

use App\Http\Controllers\RepairController;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Repair",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="wrecker_id",
 *          description="wrecker_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="client_id",
 *          description="client_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="vehiclecategory_id",
 *          description="vehiclecategory_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="peopletype_id",
 *          description="peopletype_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="reasons",
 *          description="reasons",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date_getting",
 *          description="date_getting",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="place_getting",
 *          description="place_getting",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hour_getting",
 *          description="hour_getting",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="exchanger",
 *          description="exchanger",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="counter",
 *          description="counter",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kg",
 *          description="kg transporté",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="kms",
 *          description="kms",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="extension",
 *          description="extension",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="charge",
 *          description="charge",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pc",
 *          description="pc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="scope",
 *          description="scope",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tvs_place",
 *          description="tvs_place",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="others",
 *          description="others",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="luggage",
 *          description="luggage",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="car_license",
 *          description="car_license",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="car_keys",
 *          description="car_keys",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="car_brand",
 *          description="car_brand",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="car_imm",
 *          description="car_imm",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date_release",
 *          description="date_release",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="total_amount",
 *          description="total_amount",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Repair extends Model
{
    use SoftDeletes;

    public $table = 'repairs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $daysPen = 3;
    protected $timeNight = 17;
    protected $dates = ['deleted_at'];


    public $fillable = [
        'wrecker_id',
        'client_id',
        'vehiclecategory_id',
        'peopletype_id',
        'reference',
        'reasons',
        'date_getting',
        'place_getting',
        'hour_getting',
        'exchanger',
        'counter',
        'kms',
        'kg',
        'extension',
        'charge',
        'pc',
        'scope',
        'tvs_place',
        'others',
        'luggage',
        'car_license',
        'car_keys',
        'car_brand',
        'car_imm',
        'state',
        'date_release',
        'total_amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'wrecker_id' => 'integer',
        'client_id' => 'integer',
        'vehiclecategory_id' => 'integer',
        'peopletype_id' => 'integer',
        'reference' => 'string',
        'reasons' => 'string',
        'date_getting' => 'date',
        'place_getting' => 'string',
        'hour_getting' => 'string',
        'exchanger' => 'string',
        'counter' => 'string',
        'kms' => 'string',
        'kg' => 'integer',
        'extension' => 'string',
        'charge' => 'string',
        'pc' => 'string',
        'scope' => 'string',
        'tvs_place' => 'string',
        'others' => 'string',
        'luggage' => 'boolean',
        'car_license' => 'boolean',
        'car_keys' => 'boolean',
        'car_brand' => 'string',
        'car_imm' => 'string',
        'state' => 'string',
        'date_release' => 'string',
        'total_amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'wrecker_id' => 'required|exists:wreckers,id',
        'client_id' => 'nullable|required_without:fullname,phone1|exists:clients,id',
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'reference' => 'required',
        'reasons' => 'required',
        'date_getting' => 'required',
        'place_getting' => 'required',
        'hour_getting' => 'required',
        'exchanger' => 'nullable',
        'counter' => 'nullable',
        'kms' => 'required',
        'kg' => 'nullable',
        'extension' => 'nullable',
        'charge' => 'nullable',
        'pc' => 'nullable',
        'scope' => 'nullable',
        'tvs_place' => 'nullable',
        'others' => 'nullable',
        'luggage' => 'nullable|boolean',
        'car_license' => 'nullable|boolean',
        'car_keys' => 'nullable|boolean',
        'car_brand' => 'required',
        'car_imm' => 'required',
        'state' => 'nullable',
        'date_release' => 'nullable',
        'total_amount' => 'nullable|numeric'
    ];

    public function numberDays()
    {   
        $datetime1 = new \DateTime($this->date_getting);
        $datetime2 = ($this->date_release)?new \DateTime(gmdate('Y-m-d',strtotime($this->date_release))):new \DateTime(gmdate('Y-m-d'));
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        return $days+1;
    }

    public function tarif()
    {
        $enlevement = 0;
        $tarif = \App\Models\Pricegetting::where('vehiclecategory_id', $this->vehiclecategory_id)
                                ->where('peopletype_id', $this->peopletype_id)
                                ->first();
        $enlevement = (intval(substr($this->hour_getting,0,2))>$this->timeNight)? $tarif->price_night: $enlevement = $tarif->price_day;

        return $enlevement;
    }

    public function typepricing()
    {
        return (intval(substr($this->hour_getting,0,2))>$this->timeNight)?'NUIT':'JOUR';
    }

    public function penalite()
    {
        $penalites = 0;
        $pen = \App\Models\Pricepenality::where('vehiclecategory_id', $this->vehiclecategory_id)
                                ->where('peopletype_id', $this->peopletype_id)
                                ->first();  
        if($this->numberDays()>$this->daysPen)
            return $pen->penality_per_day;
        else
            return $pen->penality_per_day;   
    }

    public function perKg()
    {
        $tarif = \App\Models\Pricegetting::where('vehiclecategory_id', $this->vehiclecategory_id)
                                ->where('peopletype_id', $this->peopletype_id)
                                ->first();
        return $tarif->per_kg;                  
    }

    public function sumDays()
    {
        $enlevement = 0;
        $penalites = 0;
        $tarif = \App\Models\Pricegetting::where('vehiclecategory_id', $this->vehiclecategory_id)
                                ->where('peopletype_id', $this->peopletype_id)
                                ->first();
        $pen = \App\Models\Pricepenality::where('vehiclecategory_id', $this->vehiclecategory_id)
                                ->where('peopletype_id', $this->peopletype_id)
                                ->first();
        if($tarif != null) {
            if (!$tarif->per_kg) {
                $enlevement = (intval(substr($this->hour_getting, 0, 2)) > $this->timeNight) ? $tarif->price_night : $enlevement = $tarif->price_day;
                if ($this->numberDays() > $this->daysPen) {
                    $penalites = $pen->penality_per_day * ($this->numberDays() - $this->daysPen);
                }
            } else {
                $enlevement = $this->tarif() * $this->kg;
                $penalites = $this->penalite() * $this->kg * ($this->numberDays() - $this->daysPen);
            }
        }
        

                    
        return $enlevement+$penalites;
    }

    public function tva()
    {
        return 0;//$this->sumDays()*0.18;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function wrecker()
    {
        return $this->belongsTo(\App\Models\Wrecker::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function criteriaRepairs()
    {
        return $this->hasMany(\App\Models\CriteriaRepair::class);
    }

    public function criterias()
    {
        return $this->belongsToMany(\App\Models\Criteria::class, 'criteria_repairs')->withPivot('number','yes','comments');
    }


}
