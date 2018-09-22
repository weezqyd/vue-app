<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Supplier.
 *
 * @package namespace App\Entities;
 */
class Headquater extends Model implements Transformable
{
    use TransformableTrait;

    protected $appends = ['order_count'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'branch_id'];

    /**
     * Get the order relation of the hedquaters entity
     *
     * @return HasMany
     **/
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get orders for this HQ entity
     * 
     * @return Collection
     **/
    public function getOrderCountAttribute() 
    {
        return $this->orders()->count();
    }

}
