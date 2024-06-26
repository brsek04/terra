<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $branch_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Branch $branch
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class About extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'branch_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','branch_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }
    

}
