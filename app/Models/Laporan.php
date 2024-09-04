<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'laporan';

    protected function casts(): array
    {
        return [
            'data_murid' => 'array',
            'data_agama' => 'array',
            'data_usia' => 'array',
            'data_absen' => 'array',
            'data_waktu' => 'array',
            'data_inventaris' => 'array',
            'data_guru' => 'array',
        ];
    }

    public function sekolah():BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id','id');
    }

    public static function statusList($type)
    {
        $badge = [
            '<h5 class="mb-0"><span class="badge w-100 badge-warning">PENGAJUAN BARU</span></h5>',
            '<h5 class="mb-0"><span class="badge w-100 badge-success">DISETUJUI</span></h5>',
            '<h5 class="mb-0"><span class="badge w-100 badge-danger">DITOLAK</span></h5>',
        ];

        $label = [
            'Pengajuan Baru',
            'Disetujui',
            'Ditolak',
        ];

        return $$type;
    }

    public static function bulanList()
    {
        $data = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        return $data;
    }
}
