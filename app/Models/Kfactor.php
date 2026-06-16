<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kfactor extends Model
{
    use SoftDeletes;

    /**
     * Fillable attributes
     *
     * @var array<string>
     */
    protected $fillable = [
        'scanner_id',
        'manufacturer_id',
        'phantom_diameter',
        'shaped_filter',
        'kv',
        'spectral_filter',
        'coll_N',
        'coll_T',
        'coll_width',
        'ctdi100_center',
        'ctdi_w',
    ];


    /**
     * Attribute casting
     */
    protected function casts(): array
    {
        return [
            'created_at'   => 'datetime',
            'deleted_at'   => 'datetime',
            'updated_at'   => 'datetime',
        ];
    }

    /**
     * Relationships
     */
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function scanner(): BelongsTo
    {
        return $this->belongsTo(Scanner::class);
    }
}
