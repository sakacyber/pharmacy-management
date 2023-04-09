<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use CrudTrait;
    use HasFactory;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'expired_date',
        'description',
        'price_buy',
        'price_sell',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'expired_date' => 'date',
        'price_buy' => 'double',
        'price_sell' => 'double',
    ];
}
