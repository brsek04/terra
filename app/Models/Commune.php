<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Commune
 *
 * @property $id
 * @property $name
 * @property $region_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Branch[] $branches
 * @property Region $region
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Commune extends Model
{
    
    static $rules = [
		'name' => 'required',
		'region_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','region_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany('App\Models\Branch', 'commune_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function region()
    {
        return $this->hasOne('App\Models\Region', 'id', 'region_id');
    }
    

}
