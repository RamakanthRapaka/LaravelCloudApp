<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    use SoftDeletes;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'addedOn';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedOn';

    protected $dates = [
        'addedOn',
        'updatedOn',
        'deleted_at',
    ];
    protected $fillable = [
        'name',
        'code',
        'count',
        'price',
        'addedOn',
        'updatedOn',
        'deleted_at',
        'description',
    ];

}
