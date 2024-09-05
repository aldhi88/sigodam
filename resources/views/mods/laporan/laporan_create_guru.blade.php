<div>

    <div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>NIP/ NI PPPK</label>
                    <input autofocus type="text" wire:model="temp.nip" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" wire:model="temp.nama" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" wire:model="temp.tempat_lahir" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" wire:model="temp.tgl_lahir" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control form-control-sm" wire:model="temp.gender">
                        <option value="">- Gender -</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Ijazah & Tahun</label>
                    <input type="text" wire:model="temp.ijazah" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control form-control-sm" wire:model="temp.jabatan">
                        <option value="">- Jabatan -</option>
                        <option value="Kepala">Kepala {{$dt['sekolah']['jenis_sekolah']}}</option>
                        <option value="Guru Kelas">Guru Kelas</option>
                        <option value="Guru Orkes">Guru Orkes</option>
                        <option value="Guru Agama">Guru Agama</option>
                        <option value="Penjaga/ADM Sekolah">Penjaga/ADM Sekolah</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Tgl Tugas di {{$dt['sekolah']['jenis_sekolah']}} ini</label>
                    <input type="date" wire:model="temp.tgl_bertugas" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>No & Tgl SK Pertama</label>
                    <input type="text" wire:model="temp.no_sk" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>No & Tgl SK Terahir Gol</label>
                    <input type="text" wire:model="temp.no_sk_akhir" class="form-control form-control-sm">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Golongan / Ruang TMT</label>
                    <input type="text" wire:model="temp.golongan" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Jam Mengajar/minggu</label>
                    <input type="text" wire:model="temp.jam" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="text" wire:model="temp.gaji" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control form-control-sm" wire:model="temp.agama">
                        <option value="">- Agama -</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" wire:model="temp.ket" class="form-control form-control-sm">
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col">
                <button type="button" wire:click="addPegawai" class="btn btn-success">Tambahkan Pegawai</button>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-light" wire:click="initDataTemp">Reset Form</button>
            </div>
        </div>
    </div>


    <hr>

    <div class="table-responsive mt-2">

        <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 200%">
            <thead class="text-center">
                <tr>
                    <th rowspan="3"></th>
                    <th rowspan="3">No</th>
                    <th rowspan="3">NIP/ NI PPPK</th>
                    <th rowspan="3">NAMA</th>
                    <th rowspan="3">Tempat Lahir</th>
                    <th rowspan="3">Tanggal Lahir</th>
                    <th rowspan="3">L/P</th>
                    <th rowspan="3">Ijazah tertinggi dan tahun ijazah</th>
                    <th colspan="5">Jabatan</th>
                    <th rowspan="3">Tanggal Mulai ber Tugas di SD ini </th>
                    <th rowspan="3">No dan tanggal SK penganggkatan pertama</th>
                    <th rowspan="3">Nomor dan Tanggal SK terakhir dalam Golongan</th>
                    <th rowspan="3">Golongan / Ruang TMT</th>
                    <th rowspan="3">Jml jam mengajar / minggu</th>
                    <th rowspan="3">Gaji Pokok (Rp.) </th>
                    <th colspan="4">Masa Kerja</th>
                    <th rowspan="3">Agama</th>
                    <th colspan="4">Absen</th>
                    <th colspan="2">Jumlah Tanggungan</th>
                    <th rowspan="3">Keterangan</th>
                </tr>

                <tr>
                    <th rowspan="2">Kepala {{$dt['sekolah']['jenis_sekolah']}}</th>
                    <th rowspan="2">Guru Kelas</th>
                    <th rowspan="2">Guru Orkes</th>
                    <th rowspan="2">Guru Agama</th>
                    <th rowspan="2">Penjaga / ADM Sekolah</th>
                    <th colspan="2">Gol</th>
                    <th colspan="2">Seluruhnya</th>
                    <th rowspan="2" style="width: 40px">S</th>
                    <th rowspan="2" style="width: 40px">I</th>
                    <th rowspan="2" style="width: 40px">A</th>
                    <th rowspan="2">Jlh</th>
                    <th rowspan="2" style="width: 40px">Istri/Suami</th>
                    <th rowspan="2" style="width: 40px">Anak</th>
                </tr>

                <tr>
                    <th style="width: 40px">Thn</th>
                    <th style="width: 40px">Bln</th>
                    <th style="width: 40px">Thn</th>
                    <th style="width: 40px">Bln</th>
                </tr>
            </thead>

            <tbody>
                <style>
                    tr.v-mid td{
                        vertical-align: middle;
                    }
                </style>
                @foreach ($form['data_guru']['data'] as $i => $item)
                    <tr class="text-center v-mid">
                        <td>
                            <button type="button" wire:click="delPegawai({{$i}})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                        <td>{{$i+1}}</td>
                        <td>{{$item['nip']}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['tempat_lahir']}}</td>
                        <td>{{$item['tgl_lahir']}}</td>
                        <td>{{$item['gender']}}</td>
                        <td>{{$item['ijazah']}}</td>
                        <td>{!!$item['jabatan']=='Kepala'?'&check;':'-'!!}</td>
                        <td>{!!$item['jabatan']=='Guru Kelas'?'&check;':'-'!!}</td>
                        <td>{!!$item['jabatan']=='Guru Orkes'?'&check;':'-'!!}</td>
                        <td>{!!$item['jabatan']=='Guru Agama'?'&check;':'-'!!}</td>
                        <td>{!!$item['jabatan']=='Penjaga/ADM Sekolah'?'&check;':'-'!!}</td>
                        <td>{{$item['tgl_bertugas']}}</td>
                        <td>{{$item['no_sk']}}</td>
                        <td>{{$item['no_sk_akhir']}}</td>
                        <td>{{$item['golongan']}}</td>
                        <td>{{$item['jam']}}</td>
                        <td>{{$item['gaji']}}</td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.gol_thn"></td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.gol_bln"></td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.all_thn"></td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.all_bln"></td>
                        <td>{{$item['agama']}}</td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.sakit"></td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.izin"></td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.alpa"></td>
                        <td>
                            @php
                                $jlh = $form['data_guru']['data'][$i]['sakit']+
                                    $form['data_guru']['data'][$i]['izin']+
                                    $form['data_guru']['data'][$i]['alpa'];
                            @endphp
                            {{$jlh}}
                        </td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.istri_suami"></td>
                        <td><input type="text" class="text-center" style="width: 100%" wire:model.live="form.data_guru.data.{{$i}}.anak"></td>
                        <td>{{$item['ket']}}</td>
                    </tr>
                @endforeach
            </tbody>


        </table>

    </div>

</div>
