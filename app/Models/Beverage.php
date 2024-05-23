<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Beverage
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $price
 * @property $alcohol
 * @property $photo
 * @property $rating
 * @property $type_id
 * @property $created_at
 * @property $updated_at
 *
 * @property BeverageType $beverageType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Beverage extends Model
{
    
    static $rules = [
		'name' => 'required',
		'price' => 'required',
		'alcohol' => 'required',
		'type_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','price','alcohol','photo','rating','type_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function beverageType()
    {
        return $this->hasOne('App\Models\BeverageType', 'id', 'type_id');
    }
    

}
