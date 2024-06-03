<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Branch
 *
 * @property $id
 * @property $name
 * @property $address
 * @property $phone
 * @property $company_id
 * @property $commune_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Commune $commune
 * @property Company $company
 * @property Menu[] $menuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Branch extends Model
{
    
    static $rules = [
		'name' => 'required',
		'address' => 'required',
		'phone' => 'required',
		'company_id' => 'required',
		'commune_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','address','phone','company_id','commune_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function commune()
    {
        return $this->hasOne('App\Models\Commune', 'id', 'commune_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuses()
    {
        return $this->hasMany('App\Models\Menu', 'branch_id', 'id');
    }
    
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

}
