<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Get all of the comments for the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jadwal_periksas(): HasMany
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter', 'id');
    }
}
