<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'url', 'price', 'description'
    ];

    public function search($filter = null)
    {

        $results = $this
                    ->where('name', 'LIKE', "%{$filter}%") 
                    ->orWhere('description', 'LIKE', "%{$filter}%") 
                    ->paginate(1);

        return $results;
    }


    public function details()
    {
        return $this->hasMany(PlanDetail::class);
    }

}
