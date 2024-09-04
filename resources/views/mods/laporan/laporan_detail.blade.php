<div>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">

                    <h6>Data Sekolah</h6>
                    <div class="alert alert-secondary mb-0">
                        <div class="row">
                            <div class="col">
                                <table style="width:100%">
                                    <tr>
                                        <th>Sekolah</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['nama_sekolah']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Sekolah</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['status_sekolah']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Pendirian</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['tahun_pendirian']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Daerah Tingkat II</th>
                                        <th>:</th>
                                        <td>ACEH TIMUR</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Pelaksanaan Gugus Sekolah</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['kategori_gugus']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jarak Sekolah ini dengan Kantor Camat</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['jarak_ke_camat']}} Km</td>
                                    </tr>
                                    <tr>
                                        <th>Untuk Bulan</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['tgl_laporan_indonesia']}}</td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col">
                                <table style="width:100%">
                                    <tr>
                                        <th>No. Agenda</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['no_agenda']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['kecamatan']}}</td>
                                    </tr>
                                    <tr>
                                        <th>KANIN/KANDEP DIKBUD KEC</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['kanin']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Penilik TK/SD/SLTP</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['penilik']}}</td>
                                    </tr>
                                    <tr>
                                        <th>NSS</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['nss']}}</td>
                                    </tr>
                                    <tr>
                                        <th>NPSN</th>
                                        <th>:</th>
                                        <td>{{$dt['laporan']['sekolah']['npsn']}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h6>A. Data Murid</h6>
                    <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 100%">
                        <thead class="text-center text-dark" style="font-weight: bold">
                            <tr>
                                <th rowspan="3">KEADAAN</th>
                                <th colspan="{{$dt['jlh_kelas']*2+2}}">BANYAKNYA MURID</th>
                                <th rowspan="3">JUMLAH <br> SELURUH <br> NYA</th>
                            </tr>
                            <tr>
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                <th colspan="2">Kelas {{$dt['angkaRomawi'][$i]}}</th>
                                @endfor
                                <th colspan="2">Jumlah</th>
                            </tr>
                            <tr>
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                <th>L</th><th>P</th>
                                @endfor
                                <th>L</th><th>P</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Murid Mengulang Tahun ini</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['murid_mengulang'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['murid_mengulang'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['murid_mengulang'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['murid_mengulang'][$i]['p']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Pada akhir bulan lalu</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['murid_bulan_lalu'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['murid_bulan_lalu'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['murid_bulan_lalu'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['murid_bulan_lalu'][$i]['p']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Keluar bulan ini</td>
                                <td colspan="{{$dt['jlh_kelas']*2+2}}"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">&nbsp;&nbsp;&nbsp; a. Pindah sekolah</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['pindah'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['pindah'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['pindah'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['pindah'][$i]['l']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">&nbsp;&nbsp;&nbsp; b. Putus sekolah</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['putus'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['putus'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['putus'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['putus'][$i]['l']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">&nbsp;&nbsp;&nbsp; c. Meninggal</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['mati'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['mati'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['mati'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['mati'][$i]['l']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>

                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Masuk bulan ini</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['masuk'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['masuk'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['masuk'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['masuk'][$i]['l']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Jumlah yang naik kelas</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['naik'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['naik'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['masuk'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['masuk'][$i]['l']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Jumlah yang tidak naik kelas</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['data']['tidak_naik'][$i]['l'];
                                    $total_p += $form['data_murid']['data']['tidak_naik'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['data']['tidak_naik'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['data']['tidak_naik'][$i]['l']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>

                            {{-- total --}}
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Jumlah pada akhir bulan ini</td>
                                @php $total_l = 0;$total_p = 0;@endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_l += $form['data_murid']['total']['jlh_bulan_ini'][$i]['l'];
                                    $total_p += $form['data_murid']['total']['jlh_bulan_ini'][$i]['p'];
                                @endphp
                                <td>{{$form['data_murid']['total']['jlh_bulan_ini'][$i]['l']}}</td>
                                <td>{{$form['data_murid']['total']['jlh_bulan_ini'][$i]['p']}}</td>
                                @endfor
                                <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Jumlah seluruhnya (L + P)</td>
                                @php $total_lp=0; @endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_lp += $form['data_murid']['total']['jlh_bulan_ini'][$i]['lp'];
                                @endphp
                                <td colspan="2">{{$form['data_murid']['total']['jlh_bulan_ini'][$i]['lp']}}</td>
                                @endfor
                                <td colspan="2">{{$total_lp}}</td>
                                <td>{{$total_lp}}</td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder; min-width: 240px;">Jumlah kelas (Rombongan belajar)</td>
                                @php $total_kelas=0; @endphp
                                @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                @php
                                    $total_kelas += $form['data_murid']['data']['kelas'][$i]['jlh'];
                                @endphp
                                <td colspan="2">{{$form['data_murid']['data']['kelas'][$i]['jlh']}}</td>
                                @endfor
                                <td colspan="2">{{$total_kelas}}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>
                    <h6>B. Agama</h6>
                    <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 100%">
                        <thead class="text-center text-dark" style="font-weight: bold">
                            <tr>
                                <th rowspan="3">KEADAAN</th>
                                <th colspan="{{ $dt['jlh_kelas'] * 2 }}">KELAS</th>
                                <th rowspan="2" colspan="3">JUMLAH</th>
                            </tr>
                            <tr>
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    <th colspan="2">{{ $dt['angkaRomawi'][$i] }}</th>
                                @endfor
                            </tr>
                            <tr>
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    <th>L</th>
                                    <th>P</th>
                                @endfor
                                <th>L</th>
                                <th>P</th>
                                <th>L+P</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Islam</td>
                                @php
                                    $total_l = 0;
                                    $total_p = 0;
                                @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_l += $form['data_agama']['data']['islam'][$i]['l'];
                                        $total_p += $form['data_agama']['data']['islam'][$i]['p'];
                                    @endphp
                                    <td>{{$form['data_agama']['data']['islam'][$i]['l']}}</td>
                                    <td>{{$form['data_agama']['data']['islam'][$i]['p']}}</td>
                                @endfor
                                <td>{{ $total_l }}</td>
                                <td>{{ $total_p }}</td>
                                <td>{{ $total_l+$total_p }}</td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Katolik</td>
                                @php
                                    $total_l = 0;
                                    $total_p = 0;
                                @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_l += $form['data_agama']['data']['katolik'][$i]['l'];
                                        $total_p += $form['data_agama']['data']['katolik'][$i]['p'];
                                    @endphp
                                    <td>{{$form['data_agama']['data']['katolik'][$i]['l']}}</td>
                                    <td>{{$form['data_agama']['data']['katolik'][$i]['p']}}</td>
                                @endfor
                                <td>{{ $total_l }}</td>
                                <td>{{ $total_p }}</td>
                                <td>{{ $total_l+$total_p }}</td>
                            </tr>

                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Protestan</td>
                                @php
                                    $total_l = 0;
                                    $total_p = 0;
                                @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_l += $form['data_agama']['data']['protestan'][$i]['l'];
                                        $total_p += $form['data_agama']['data']['protestan'][$i]['p'];
                                    @endphp
                                    <td>{{$form['data_agama']['data']['protestan'][$i]['l']}}</td>
                                    <td>{{$form['data_agama']['data']['protestan'][$i]['p']}}</td>
                                @endfor
                                <td>{{ $total_l }}</td>
                                <td>{{ $total_p }}</td>
                                <td>{{ $total_l+$total_p }}</td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Hindu</td>
                                @php
                                    $total_l = 0;
                                    $total_p = 0;
                                @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_l += $form['data_agama']['data']['hindu'][$i]['l'];
                                        $total_p += $form['data_agama']['data']['hindu'][$i]['p'];
                                    @endphp
                                    <td>{{$form['data_agama']['data']['hindu'][$i]['l']}}</td>
                                    <td>{{$form['data_agama']['data']['hindu'][$i]['p']}}</td>
                                @endfor
                                <td>{{ $total_l }}</td>
                                <td>{{ $total_p }}</td>
                                <td>{{ $total_l+$total_p }}</td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">Budha</td>
                                @php
                                    $total_l = 0;
                                    $total_p = 0;
                                @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_l += $form['data_agama']['data']['budha'][$i]['l'];
                                        $total_p += $form['data_agama']['data']['budha'][$i]['p'];
                                    @endphp
                                    <td>{{$form['data_agama']['data']['budha'][$i]['l']}}</td>
                                    <td>{{$form['data_agama']['data']['budha'][$i]['p']}}</td>
                                @endfor
                                <td>{{ $total_l }}</td>
                                <td>{{ $total_p }}</td>
                                <td>{{ $total_l+$total_p }}</td>
                            </tr>

                            {{-- total --}}
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder">JUMLAH</td>
                                @php
                                    $total_l = 0;
                                    $total_p = 0;
                                @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_l += $form['data_agama']['total']['jlh_bulan_ini'][$i]['l'];
                                        $total_p += $form['data_agama']['total']['jlh_bulan_ini'][$i]['p'];
                                    @endphp
                                    <td>{{ $form['data_agama']['total']['jlh_bulan_ini'][$i]['l'] }}</td>
                                    <td>{{ $form['data_agama']['total']['jlh_bulan_ini'][$i]['p'] }}</td>
                                @endfor
                                <td>{{ $total_l }}</td>
                                <td>{{ $total_p }}</td>
                                <td>{{ $total_l+$total_p }}</td>
                            </tr>
                            <tr>
                                <td class="text-left text-dark" style="font-weight: bolder; min-width: 110px">JUMLAH (L+P)
                                </td>
                                @php $total_lp=0; @endphp
                                @for ($i = 0; $i < $dt['jlh_kelas']; $i++)
                                    @php
                                        $total_lp += $form['data_agama']['total']['jlh_bulan_ini'][$i]['lp'];
                                    @endphp
                                    <td colspan="2">{{ $form['data_agama']['total']['jlh_bulan_ini'][$i]['lp'] }}</td>
                                @endfor
                                <td colspan="2">{{ $total_lp }}</td>
                                <td>{{ $total_lp }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>C. Absen Murid</h6>
                            <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 100%">
                                <tr>
                                    <td width="30">1.</td>
                                    <th colspan="4">JUMLAH HARI SEKOLAH = {{$dt['hari']}} Hari</th>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <th colspan="4">ABSEN</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th>Sakit</th>
                                    <td>:</td>
                                    <td>{{$form['data_absen']['data']['sakit']}} Hari = </td>
                                    <td>{{ number_format($form['data_absen']['data']['sakit']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th>Izin</th>
                                    <td>:</td>
                                    <td>{{$form['data_absen']['data']['izin']}} Hari = </td>
                                    <td>{{ number_format($form['data_absen']['data']['izin']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th>Alpa</th>
                                    <td>:</td>
                                    <td>{{$form['data_absen']['data']['alpa']}} Hari = </td>
                                    <td>{{ number_format($form['data_absen']['data']['alpa']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                                <tr style="border-top: 1px solid rgb(174, 174, 174)">
                                    <td></td>
                                    <th>Jumlah</th>
                                    <th>:</th>
                                    <th>{{$form['data_absen']['total']}} Hari = </th>
                                    <td>{{ number_format($form['data_absen']['total']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col">
                            <h6>D. Absen Waktu</h6>
                            <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 100%">

                                <tr>
                                    <td>1. </td>
                                    <th>Pagi</th>
                                    <td>08:00 - 13:00</td>
                                    <td>{{$form['data_waktu']['data']['pagi']?'Ya':'-'}}</td>
                                </tr>
                                <tr>
                                    <td>2. </td>
                                    <th>Sore</th>
                                    <td>13:00 - 18:00</td>
                                    <td>{{$form['data_waktu']['data']['sore']?'Ya':'-'}}</td>
                                </tr>
                                <tr>
                                    <td>3. </td>
                                    <th>Pagi dan Sore</th>
                                    <td>08:00 - 18:00</td>
                                    <td>{{$form['data_waktu']['data']['pagi_sore']?'Ya':'-'}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <hr>
                    <h6>E. Usia Murid</h6>
                    <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 100%">
                        <thead class="text-center text-dark" style="font-weight: bold">
                            <tr>
                                <th rowspan="3">KELAS</th>
                                <th colspan="11">USIA</th>
                            </tr>
                            <tr>
                                <th colspan="2">Dibawah <br> 7 tahun</th>
                                <th colspan="2">7 - 12 <br> tahun</th>
                                <th colspan="2">13 - 15 <br> tahun</th>
                                <th colspan="2">16 thn <br> keatas</th>
                                <th colspan="3">Jumlah</th>
                            </tr>
                            <tr>
                                <th>L</th><th>P</th>
                                <th>L</th><th>P</th>
                                <th>L</th><th>P</th>
                                <th>L</th><th>P</th>
                                <th>L</th><th>P</th><th>L+P</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                                <tr>
                                    <th>{{$dt['angkaRomawi'][$i]}}</th>
                                    <td>{{$form['data_usia']['data']['kecil_7'][$i]['l']}}</td>
                                    <td>{{$form['data_usia']['data']['kecil_7'][$i]['p']}}</td>
                                    <td>{{$form['data_usia']['data']['7_12'][$i]['l']}}</td>
                                    <td>{{$form['data_usia']['data']['7_12'][$i]['p']}}</td>
                                    <td>{{$form['data_usia']['data']['13_15'][$i]['l']}}</td>
                                    <td>{{$form['data_usia']['data']['13_15'][$i]['p']}}</td>
                                    <td>{{$form['data_usia']['data']['besar_16'][$i]['l']}}</td>
                                    <td>{{$form['data_usia']['data']['besar_16'][$i]['p']}}</td>
                                    <td>{{$form['data_usia']['total']['jumlah'][$i]['l']}}</td>
                                    <td>{{$form['data_usia']['total']['jumlah'][$i]['p']}}</td>
                                    <td>
                                        @php
                                        $total_lp=0;
                                        $total_lp += $form['data_usia']['total']['jumlah'][$i]['lp'];
                                        echo $form['data_usia']['total']['jumlah'][$i]['lp'];
                                        @endphp
                                    </td>
                                </tr>
                            @endfor
                            <tr>
                                <th>Jumlah</th>
                                <td>
                                    @php
                                        $total_kecil_7_l=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_kecil_7_l += $form['data_usia']['data']['kecil_7'][$i]['l'];
                                        }
                                        echo $total_kecil_7_l;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_kecil_7_p=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_kecil_7_p += $form['data_usia']['data']['kecil_7'][$i]['p'];
                                        }
                                        $total_kecil_7 = $total_kecil_7_l+$total_kecil_7_p;
                                        echo $total_kecil_7_p;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_7_12_l=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_7_12_l += $form['data_usia']['data']['7_12'][$i]['l'];
                                        }
                                        echo $total_7_12_l;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_7_12_p=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_7_12_p += $form['data_usia']['data']['7_12'][$i]['p'];
                                        }
                                        $total_7_12 = $total_7_12_l+$total_7_12_p;
                                        echo $total_7_12_p;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_13_15_l=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_13_15_l += $form['data_usia']['data']['13_15'][$i]['l'];
                                        }
                                        echo $total_13_15_l;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_13_15_p=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_13_15_p += $form['data_usia']['data']['13_15'][$i]['p'];
                                        }
                                        $total_13_15 = $total_13_15_l+$total_13_15_p;
                                        echo $total_13_15_p;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_besar_16_l=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_besar_16_l += $form['data_usia']['data']['besar_16'][$i]['l'];
                                        }
                                        echo $total_besar_16_l;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $total_besar_16_p=0;
                                        for ($i=0;$i<$dt['jlh_kelas'];$i++) {
                                            $total_besar_16_p += $form['data_usia']['data']['besar_16'][$i]['p'];
                                        }
                                        $total_besar_16 = $total_besar_16_l+$total_besar_16_p;
                                        echo $total_besar_16_p;
                                    @endphp
                                </td>
                                @php
                                    $total_l = $total_kecil_7_l + $total_7_12_l + $total_13_15_l + $total_besar_16_l;
                                    $total_p = $total_kecil_7_p + $total_7_12_p + $total_13_15_p + $total_besar_16_p;
                                    $total_lp_all = $total_kecil_7 + $total_7_12 + $total_13_15 + $total_besar_16;
                                @endphp
                                <th>{{$total_l}}</th>
                                <th>{{$total_p}}</th>
                                <th>{{$total_lp_all}}</th>
                            </tr>
                            <tr>
                                <th style="min-width: 100px">Jumlah (L+P)</th>
                                <td colspan="2">{{ $total_kecil_7 }}</td>
                                <td colspan="2">{{ $total_7_12 }}</td>
                                <td colspan="2">{{ $total_13_15 }}</td>
                                <td colspan="2">{{ $total_besar_16 }}</td>
                                <th colspan="2">{{ $total_lp_all }}</th>
                                <th>{{ $total_lp_all }}</th>
                            </tr>
                        </tbody>
                    </table>



                    <hr>
                    <h6>F. Inventaris</h6>
                    <div class="row">
                        <div class="col">-</div>
                    </div>

                    <hr>
                    <h6>G. Keadaan Guru / Pegawai</h6>
                    <div class="row">
                        <div class="col">-</div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>
