<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Venturecraft\Revisionable\RevisionableTrait;

class Invoice extends Model
{
    use CrudTrait;
    use HasFactory;
    use RevisionableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_no',
        'date',
        'tax',
        'discount',
        'total',
        'description',
        'note',
        'header',
        'footer',
        'user_id',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function previewInvoice($id){
    //     return '<a class="btn btn-sm btn-link" target="_blank" href="url('invoice/id/view')" data-toggle="tooltip"><i class="la la-eye"></i> Invoice</a>';
    // }

    public function identifiableName()
    {
        return $this->name;
    }
}
