<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Entities;
 */
class Order extends Model implements Transformable
{

    protected $appends = ['hq'];

    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_code', 'headquater_id'];

    public function headquater()
    {
        return $this->belongsTo(Headquater::class);
    }

    public function getHqAttribute()
    {
        return $this->headquater ? $this->headquater->name : 'Not Set';
    }

}
