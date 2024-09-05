<div>

    <div class="table-responsive mt-2">

        <table style="width: 100%" border="0" class="text-dark">
            <tr>
                <td>I.</td>
                <td colspan="12">BARANG TIDAK BERGERAK</td>
            </tr>
            {{-- 1 --}}
            <tr>
                <td></td>
                <td>1.</td>
                <td>a.</td>
                <td colspan="4">Gedung milik sendiri</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i1a">
                </td>
                <td colspan="5">Ruang</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b.</td>
                <td colspan="10">Terletak di Desa {{$dt['sekolah']['nama_desa']}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>c.</td>
                <td colspan="3">Ruang yang ada terdiri dari :</td>
                <td>Ruang Kelas</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_kelas">
                </td>
                <td>Buah</td>
                <td>R. Kep Sek</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_kepsek">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="3"></td>
                <td>Ruang Guru</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_guru">
                </td>
                <td>Buah</td>
                <td>R. Pustaka</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_pustaka">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="3"></td>
                <td>Ruang UKS</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_uks">
                </td>
                <td>Buah</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            {{-- 2 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>2.</td>
                <td colspan="2">Gedung {{$dt['sekolah']['jenis_sekolah']}}</td>
                <td colspan="3" class="text-center">Ruang Kelas Permanen</td>
                <td colspan="3" class="text-center">Ruang Kelas Semi Permanen</td>
                <td colspan="3" class="text-center">Ruang Kelas Darurat</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a.</td>
                <td>Milik Sendiri</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2a_permanen">
                </td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2a_semi">
                </td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2a_darurat">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b.</td>
                <td>Menumpang</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2b_permanen">
                </td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2b_semi">
                </td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2b_darurat">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>c.</td>
                <td>Sewa</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2c_permanen">
                </td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2c_semi">
                </td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model.live="form.data_inventaris.data.i2c_darurat">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                @php
                    $jlh_permanen =
                        $form['data_inventaris']['data']['i2a_permanen'] +
                        $form['data_inventaris']['data']['i2b_permanen'] +
                        $form['data_inventaris']['data']['i2c_permanen'];
                    $jlh_semi =
                        $form['data_inventaris']['data']['i2a_semi'] +
                        $form['data_inventaris']['data']['i2b_semi'] +
                        $form['data_inventaris']['data']['i2c_semi'];
                    $jlh_darurat =
                        $form['data_inventaris']['data']['i2a_darurat'] +
                        $form['data_inventaris']['data']['i2b_darurat'] +
                        $form['data_inventaris']['data']['i2c_darurat'];
                @endphp
                <td></td>
                <td></td>
                <td></td>
                <td>JUMLAH</td>
                <td>=</td>
                <td class="text-center">{{$jlh_permanen}}</td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">{{$jlh_semi}}</td>
                <td>Buah</td>
                <td>=</td>
                <td class="text-center">{{$jlh_darurat}}</td>
                <td>Buah</td>
            </tr>

            {{-- 3 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>3.</td>
                <td colspan="5">Kondisi Gedung milik sendiri : Permanen</td>
                <td colspan="2" class="text-center">Semi Permanen</td>
                <td colspan="2" class="text-center">Darurat</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a.</td>
                <td>Baik</td>
                <td>:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3a_permanen">
                </td>
                <td>Buah ruang</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3a_semi">
                </td>
                <td>Buah ruang</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3a_darurat">
                </td>
                <td>Buah ruang</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b.</td>
                <td>Rusak ringan</td>
                <td>:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3b_permanen">
                </td>
                <td>Buah ruang</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3b_semi">
                </td>
                <td>Buah ruang</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3b_darurat">
                </td>
                <td>Buah ruang</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>c.</td>
                <td>Rusak berat</td>
                <td>:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3c_permanen">
                </td>
                <td>Buah ruang</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3c_semi">
                </td>
                <td>Buah ruang</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i3c_darurat">
                </td>
                <td>Buah ruang</td>
                <td></td>
                <td></td>
            </tr>

            {{-- 4 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>4.</td>
                <td>a.</td>
                <td colspan="2">Luas tanah sekolah : </td>
                <td class="text-center">
                    <input type="text" style="width: 60px" class="text-center" wire:model="form.data_inventaris.data.i4a">
                </td>
                <td colspan="7">M<sup>2</sup></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b.</td>
                <td colspan="2">Luas bangunan seluruhnya :  </td>
                <td class="text-center">
                    <input type="text" style="width: 60px" class="text-center" wire:model="form.data_inventaris.data.i4b">
                </td>
                <td colspan="7">M<sup>2</sup></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>c.</td>
                <td colspan="2">Luas tanah yang belum terpakai :  </td>
                <td class="text-center">
                    <input type="text" style="width: 60px" class="text-center" wire:model="form.data_inventaris.data.i4c">
                </td>
                <td colspan="7">M<sup>2</sup></td>
            </tr>

            {{-- 5 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>5.</td>
                <td colspan="11">Rehabilitasi tahun terakhir</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a.</td>
                <td>Rehab total</td>
                <td colspan="2">:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5a_item">
                </td>
                <td>unit</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5a_luas">
                </td>
                <td>M<sup>2</sup></td>
                <td>tahun:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5a_tahun">
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b.</td>
                <td>Rehab berat</td>
                <td colspan="2">:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5b_item">
                </td>
                <td>unit</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5b_luas">
                </td>
                <td>M<sup>2</sup></td>
                <td>tahun:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5b_tahun">
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>c.</td>
                <td>Rehab ringan</td>
                <td colspan="2">:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5c_item">
                </td>
                <td>unit</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5c_luas">
                </td>
                <td>M<sup>2</sup></td>
                <td>tahun:</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i5c_tahun">
                </td>
                <td></td>
            </tr>

            {{-- 6 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>6.</td>
                <td colspan="11">
                    Pagar pekarangan {{$dt['sekolah']['jenis_sekolah']}}
                    <select class="ml-3" wire:model="form.data_inventaris.data.i6">
                        <option value="baik">baik</option>
                        <option value="darurat">darurat</option>
                        <option value="tidak ada">tidak ada</option>
                    </select>
                </td>
            </tr>

            {{-- 7 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>7.</td>
                <td colspan="3">Rumah Dinas Kepala {{$dt['sekolah']['jenis_sekolah']}}</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i7_qty">
                </td>
                <td>Buah,</td>
                <td>baik : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i7_baik">
                </td>
                <td>Buah,</td>
                <td>rusak : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i7_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="11">Dipergunakan oleh (Kepsek, Guru, PS, dll )</td>
            </tr>

            {{-- 8 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>8.</td>
                <td colspan="3">Rumah Dinas Guru {{$dt['sekolah']['jenis_sekolah']}}</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i8_qty">
                </td>
                <td>Buah,</td>
                <td>baik : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i8_baik">
                </td>
                <td>Buah,</td>
                <td>rusak : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i8_rusak">
                </td>
                <td>Buah</td>
            </tr>

            {{-- 9 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>9.</td>
                <td colspan="3">Rumah Dinas Pesuruh {{$dt['sekolah']['jenis_sekolah']}}</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i9_qty">
                </td>
                <td>Buah,</td>
                <td>baik : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i9_baik">
                </td>
                <td>Buah,</td>
                <td>rusak : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i9_rusak">
                </td>
                <td>Buah</td>
            </tr>

            {{-- 10 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>10.</td>
                <td colspan="2">Status Tanah {{$dt['sekolah']['jenis_sekolah']}} :</td>
                <td>a.</td>
                <td colspan="2">Tanah Negara Sertifikat No</td>
                <td colspan="6"><input type="text" style="width: 100%" wire:model="form.data_inventaris.data.i10a"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="2"></td>
                <td>b.</td>
                <td colspan="8">Tanah Wakaf</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="2"></td>
                <td>c.</td>
                <td colspan="8">Tanah Masyarakat</td>
            </tr>

            {{-- 11 --}}
            <tr>
                <td colspan="13" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td>11.</td>
                <td colspan="3">WC : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i11_qty">
                </td>
                <td>Buah,</td>
                <td>baik : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i11_baik">
                </td>
                <td>Buah,</td>
                <td>rusak : </td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.i11_rusak">
                </td>
                <td>Buah</td>
            </tr>


            {{-- II --}}
            <tr>
                <td colspan="13" style="height: 20px"></td>
            </tr>
            <tr>
                <td>II.</td>
                <td colspan="12">INVENTARIS {{$dt['sekolah']['jenis_sekolah']}}</td>
            </tr>

            <tr>
                <td></td>
                <td colspan="12">Jenis Barang Jumlah Keadaan</td>
            </tr>
            <tr>
                <td></td>
                <td>1.</td>
                <td colspan="3">Bangku murid (2 orang)</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii1_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii1_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii1_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>2.</td>
                <td colspan="3">Meja murid (2 orang)</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii2_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii2_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii2_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>3.</td>
                <td colspan="3">Bangku murid (1 orang)</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii3_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii3_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii3_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>4.</td>
                <td colspan="3">Meja murid (1 orang)</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii4_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii4_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii4_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>5.</td>
                <td colspan="3">Meja Guru</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii5_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii5_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii5_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>6.</td>
                <td colspan="3">Kursi guru</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii6_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii6_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii6_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>7.</td>
                <td colspan="3">Lemari</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii7_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii7_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii7_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>8.</td>
                <td colspan="3">Papan tulis</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii8_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii8_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii8_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>9.</td>
                <td colspan="3">Pengeras suara</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii9_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii9_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii9_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>10.</td>
                <td colspan="3">Buku paket murid</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii10_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii10_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii10_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>11.</td>
                <td colspan="3">Buku pegangan guru</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii11_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii11_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii11_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>12.</td>
                <td colspan="3">Buku pustaka</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii12_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii12_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii12_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>13.</td>
                <td colspan="3">Alat kesenian</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii13_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii13_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii13_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>14.</td>
                <td colspan="3">Alat olah raga</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii14_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii14_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii14_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>15.</td>
                <td colspan="3">Alat peraga matematika</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii15_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii15_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii15_rusak">
                </td>
                <td>Buah</td>
            </tr>
            <tr>
                <td></td>
                <td>16.</td>
                <td colspan="3">Alat Peraga IPA</td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii16_qty">
                </td>
                <td>Buah</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii16_baik">
                </td>
                <td>Baik</td>
                <td></td>
                <td class="text-center">
                    <input type="text" class="text-center only-number" style="width: 30px" wire:model="form.data_inventaris.data.ii16_rusak">
                </td>
                <td>Buah</td>
            </tr>


        </table>

    </div>

</div>
