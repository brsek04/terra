<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dish
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $price
 * @property $rating
 * @property $prep_time
 * @property $photo
 * @property $type_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DishType $dishType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dish extends Model
{
    
    static $rules = [
		'name' => 'required',
		'price' => 'required',
		'type_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','price','rating','prep_time','photo','type_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dishType()
    {
        return $this->hasOne('App\Models\DishType', 'id', 'type_id');
    }
    

}
