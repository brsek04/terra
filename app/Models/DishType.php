<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DishType
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Dish[] $dishes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DishType extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishes()
    {
        return $this->hasMany('App\Models\Dish', 'type_id', 'id');
    }
    

}
