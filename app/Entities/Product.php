<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $appends = ['supplier_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'product_code', 'supplier_id'];

    /**
     * Supplier relation
     *
     * @return BelongsTo
     */
    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    /**
     * Mutate the supplier name attribute
     *
     * @return string
     */
    protected function getSupplierNameAttribute() 
    {
        return $this->supplier ?  $this->supplier->name : 'Not Specified';
    }

}
