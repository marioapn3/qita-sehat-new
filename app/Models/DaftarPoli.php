<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DaftarPoli extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the user that owns the DaftarPoli
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    /**
     * Get the user that owns the DaftarPoli
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal', 'id');
    }

    /**
     * Get the user associated with the DaftarPoli
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function periksa(): HasOne
    {
        return $this->hasOne(Periksa::class, 'id_daftar_poli', 'id');
    }
}
