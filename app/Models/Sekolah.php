<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = "sekolah";

    // relation
    public function laporan():HasMany
    {
        return $this->hasMany(Laporan::class, 'sekolah_id', 'id');
    }
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public static function jenisSekolahList()
    {
        $data = ['TK', 'SD', 'SLTP'];
        return $data;
    }

    public static function statusSekolahList()
    {
        $data = ['NEGERI NON INPRES', 'NEGERI INPRES', 'SWASTA'];
        return $data;
    }

    public static function statusDesaList()
    {
        $data = ['IDT', 'NON IDT'];
        return $data;
    }

    public static function kategoriGugusList()
    {
        $data = ['INTI', 'INBAS', 'BUKAN INTI BUKAN INBAS'];
        return $data;
    }

    public static function statusBangunanList()
    {
        $data = ['MILIK SENDIRI', 'MENUMPANG', 'SEWA'];
        return $data;
    }

    public static function kecamatanList()
    {
        $data = [
            'SERBA JADI',
            'SIMPANG JERNIH',
            'PEUNARON',
            'BIREM BAYEUN',
            'RANTAU SELAMAT',
            'SUNGAI RAYA',
            'PEUREULAK',
            'PEUREULAK TIMUR',
            'PEUREULAK BARAT',
            'RANTO PEUREULAK',
            'IDI RAYEUK',
            'PEUDAWA',
            'BANDA ALAM',
            'IDI TUNONG',
            'DARUL IHSAN',
            'IDI TIMUR',
            'DARUL AMAN',
            'NURUSSALAM',
            'DARUL FALAH',
            'JULOK',
            'INDRA MAKMUR',
            'PANTE BIDARI',
            'SIMPANG ULIM',
            'MADAT'
        ];

        return $data;
    }

}
