<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $guarded = [];
    protected $table = "sekolah";


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
        $data = ['GEDUNG MILIK SENDIRI', 'MENUMPANG', 'SEWA'];
        return $data;
    }

}
