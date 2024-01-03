<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPeriksa extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the user that owns the DetailPeriksa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periksa(): BelongsTo
    {
        return $this->belongsTo(Periksa::class, 'id_periksa', 'id');
    }

    /**
     * Get the user that owns the DetailPeriksa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}
