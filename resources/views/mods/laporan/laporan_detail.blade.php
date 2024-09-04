<div>
    <div class="row">
        <div class="col">
            <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fas fa-angle-double-left"></i> Kembali</a>
        </div>

        <div class="col text-right">
            @if (Auth::user()->role_id == 1)
                @if ($form['status']==1)
                    <button class="btn btn-{{$dt['status_class']}}" disabled>{{$dt['status_label']}}</button>
                @else
                    <div class="btn-group">
                        <button class="btn btn-{{$dt['status_class']}} dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$dt['status_label']}}
                            <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="">
                            @php
                            unset($dtJson);
                            $dtJson['msg'] = 'menyetujui laporan '.$form['bln_laporan'].' '.$form['thn_laporan'].' dari '.$form['sekolah']['nama_sekolah'];
                            $dtJson['attr'] = $form['sekolah']['nama_sekolah'];
                            $dtJson['id'] = $form['id'];
                            $dtJson['callback'] = "laporansetujui-setujui";
                            $dtJson['is_from_detail'] = true;
                            $dtJson = json_encode($dtJson);
                            @endphp
                            <a class="dropdown-item text-success" data-json="{{$dtJson}}" data-emit="modalconfirm-prepare" data-toggle="modal" data-target="#modalConfirm" href="javascript:void(0);">
                                <i class="fas fa-check-circle fa-fw"></i> Setujui
                            </a>
                            @php
                            unset($dtJson);
                            $dtJson['msg'] = 'menolak laporan '.$form['bln_laporan'].' '.$form['thn_laporan'].' dari '.$form['sekolah']['nama_sekolah'];
                            $dtJson['attr'] = $form['sekolah']['nama_sekolah'];
                            $dtJson['id'] = $form['id'];
                            $dtJson['callback'] = "laporantolak-tolak";
                            $dtJson['is_from_detail'] = true;
                            $dtJson = json_encode($dtJson);
                            @endphp
                            <a class="dropdown-item text-danger" data-json="{{$dtJson}}" data-emit="modalconfirm-prepare" data-toggle="modal" data-target="#modalConfirm" href="javascript:void(0);">
                                <i class="fas fa-times-circle fa-fw"></i> Tolak
                            </a>
                        </div>
                    </div>
                @endif
            @else
                <button class="btn btn-{{$dt['status_class']}}" disabled>{{$dt['status_label']}}</button>
            @endif
        </div>
    </div><hr>
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
                                        <td>{{$form['bln_laporan']}} {{$form['thn_laporan']}}</td>
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i1a">
                                </td>
                                <td colspan="5">Ruang</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>b.</td>
                                <td colspan="10">Terletak di Desa {{$dt['laporan']['sekolah']['nama_desa']}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>c.</td>
                                <td colspan="3">Ruang yang ada terdiri dari :</td>
                                <td>Ruang Kelas</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_kelas">
                                </td>
                                <td>Buah</td>
                                <td>R. Kep Sek</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_kepsek">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_guru">
                                </td>
                                <td>Buah</td>
                                <td>R. Pustaka</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_pustaka">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i1c_r_uks">
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
                                <td colspan="2">Gedung {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2a_permanen">
                                </td>
                                <td>Buah</td>
                                <td>=</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2a_semi">
                                </td>
                                <td>Buah</td>
                                <td>=</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2a_darurat">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2b_permanen">
                                </td>
                                <td>Buah</td>
                                <td>=</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2b_semi">
                                </td>
                                <td>Buah</td>
                                <td>=</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2b_darurat">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2c_permanen">
                                </td>
                                <td>Buah</td>
                                <td>=</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2c_semi">
                                </td>
                                <td>Buah</td>
                                <td>=</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model.live="form.data_inventaris.data.i2c_darurat">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3a_permanen">
                                </td>
                                <td>Buah ruang</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3a_semi">
                                </td>
                                <td>Buah ruang</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3a_darurat">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3b_permanen">
                                </td>
                                <td>Buah ruang</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3b_semi">
                                </td>
                                <td>Buah ruang</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3b_darurat">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3c_permanen">
                                </td>
                                <td>Buah ruang</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3c_semi">
                                </td>
                                <td>Buah ruang</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i3c_darurat">
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
                                    <input type="text" style="width: 60px" class="text-center bg-light" readonly disabled wire:model="form.data_inventaris.data.i4a">
                                </td>
                                <td colspan="7">M<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>b.</td>
                                <td colspan="2">Luas bangunan seluruhnya :  </td>
                                <td class="text-center">
                                    <input type="text" style="width: 60px" class="text-center bg-light" readonly disabled wire:model="form.data_inventaris.data.i4b">
                                </td>
                                <td colspan="7">M<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>c.</td>
                                <td colspan="2">Luas tanah yang belum terpakai :  </td>
                                <td class="text-center">
                                    <input type="text" style="width: 60px" class="text-center bg-light" readonly disabled wire:model="form.data_inventaris.data.i4c">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5a_item">
                                </td>
                                <td>unit</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5a_luas">
                                </td>
                                <td>M<sup>2</sup></td>
                                <td>tahun:</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5a_tahun">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5b_item">
                                </td>
                                <td>unit</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5b_luas">
                                </td>
                                <td>M<sup>2</sup></td>
                                <td>tahun:</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5b_tahun">
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5c_item">
                                </td>
                                <td>unit</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5c_luas">
                                </td>
                                <td>M<sup>2</sup></td>
                                <td>tahun:</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i5c_tahun">
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
                                    Pagar pekarangan {{$dt['laporan']['sekolah']['jenis_sekolah']}}
                                    ({{$form['data_inventaris']['data']['i6']}})

                                </td>
                            </tr>

                            {{-- 7 --}}
                            <tr>
                                <td colspan="13" style="height: 10px"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>7.</td>
                                <td colspan="3">Rumah Dinas Kepala {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i7_qty">
                                </td>
                                <td>Buah,</td>
                                <td>baik : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i7_baik">
                                </td>
                                <td>Buah,</td>
                                <td>rusak : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i7_rusak">
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
                                <td colspan="3">Rumah Dinas Guru {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i8_qty">
                                </td>
                                <td>Buah,</td>
                                <td>baik : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i8_baik">
                                </td>
                                <td>Buah,</td>
                                <td>rusak : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i8_rusak">
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
                                <td colspan="3">Rumah Dinas Pesuruh {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i9_qty">
                                </td>
                                <td>Buah,</td>
                                <td>baik : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i9_baik">
                                </td>
                                <td>Buah,</td>
                                <td>rusak : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i9_rusak">
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
                                <td colspan="2">Status Tanah {{$dt['laporan']['sekolah']['jenis_sekolah']}} :</td>
                                <td>a.</td>
                                <td colspan="2">Tanah Negara Sertifikat No</td>
                                <td colspan="6"><input type="text" style="width: 100%" class="bg-light" readonly disabled wire:model="form.data_inventaris.data.i10a"></td>
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i11_qty">
                                </td>
                                <td>Buah,</td>
                                <td>baik : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i11_baik">
                                </td>
                                <td>Buah,</td>
                                <td>rusak : </td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.i11_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>


                            {{-- II --}}
                            <tr>
                                <td colspan="13" style="height: 20px"></td>
                            </tr>
                            <tr>
                                <td>II.</td>
                                <td colspan="12">INVENTARIS {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
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
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii1_qty">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii1_baik">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii1_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.</td>
                                <td colspan="3">Meja murid (2 orang)</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii2_qty">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii2_baik">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii2_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.</td>
                                <td colspan="3">Bangku murid (1 orang)</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii3_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii3_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii3_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>4.</td>
                                <td colspan="3">Meja murid (1 orang)</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii4_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii4_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii4_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>5.</td>
                                <td colspan="3">Meja Guru</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii5_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii5_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii5_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>6.</td>
                                <td colspan="3">Kursi guru</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii6_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii6_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii6_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>7.</td>
                                <td colspan="3">Lemari</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii7_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii7_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii7_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>8.</td>
                                <td colspan="3">Papan tulis</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii8_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii8_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii8_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>9.</td>
                                <td colspan="3">Pengeras suara</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii9_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii9_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii9_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>10.</td>
                                <td colspan="3">Buku paket murid</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii10_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii10_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii10_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>11.</td>
                                <td colspan="3">Buku pegangan guru</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii11_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii11_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii11_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>12.</td>
                                <td colspan="3">Buku pustaka</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii12_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii12_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii12_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>13.</td>
                                <td colspan="3">Alat kesenian</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii13_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii13_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii13_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>14.</td>
                                <td colspan="3">Alat olah raga</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii14_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii14_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii14_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>15.</td>
                                <td colspan="3">Alat peraga matematika</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii15_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii15_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii15_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>16.</td>
                                <td colspan="3">Alat Peraga IPA</td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii16_rusak">
                                </td>
                                <td>Buah</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii16_rusak">
                                </td>
                                <td>Baik</td>
                                <td></td>
                                <td class="text-center">
                                    <input type="text" class="text-center only-number bg-light" disabled readonly style="width: 30px" wire:model="form.data_inventaris.data.ii16_rusak">
                                </td>
                                <td>Buah</td>
                            </tr>


                        </table>

                    </div>

                    <hr>
                    <h6>G. Dana</h6>
                    <div class="row text-dark">
                        <div class="col-2">
                            <h6>Jenis Dana</h6>
                            <div class="form-group text-center">
                                <input type="text" class="form-control bg-light text-dark border-0 py-0" style="font-weight: bold" value="A.SBPP" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-light text-dark border-0 py-0" style="font-weight: bold" value="B.OP" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-light text-dark border-0 py-0" style="font-weight: bold" value="C.BP3" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-soft-success text-dark border-0 py-0" style="font-weight: bold" value="JUMLAH" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <h6>Penerimaan</h6>
                            <div class="form-group text-center">
                                <input type="text" wire:model.live="form.data_dana.data.sbpp_terima" class="form-control text-center only-number bg-light" disabled readonly>
                            </div>
                            <div class="form-group text-center">
                                <input type="text" wire:model.live="form.data_dana.data.op_terima" class="form-control text-center only-number bg-light" disabled readonly>
                            </div>
                            <div class="form-group text-center">
                                <input type="text" wire:model.live="form.data_dana.data.bp3_terima" class="form-control text-center only-number bg-light" disabled readonly>
                            </div>
                            <div class="form-group">
                                @php
                                    $jlh_terima =
                                        $form['data_dana']['data']['sbpp_terima'] +
                                        $form['data_dana']['data']['op_terima'] +
                                        $form['data_dana']['data']['bp3_terima'];
                                @endphp
                                <input type="text" class="form-control bg-soft-success text-dark border-0 py-0 text-center" style="font-weight: bold" value="{{number_format($jlh_terima,0,',','.')}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <h6>Pengeluaran</h6>
                            <div class="form-group text-center">
                                <input type="text" wire:model.live="form.data_dana.data.sbpp_keluar" class="form-control text-center only-number bg-light" disabled readonly>
                            </div>
                            <div class="form-group text-center">
                                <input type="text" wire:model.live="form.data_dana.data.op_keluar" class="form-control text-center only-number bg-light" disabled readonly>
                            </div>
                            <div class="form-group text-center">
                                <input type="text" wire:model.live="form.data_dana.data.bp3_keluar" class="form-control text-center only-number bg-light" disabled readonly>
                            </div>
                            <div class="form-group">
                                @php
                                    $jlh_keluar =
                                        $form['data_dana']['data']['sbpp_keluar'] +
                                        $form['data_dana']['data']['op_keluar'] +
                                        $form['data_dana']['data']['bp3_keluar'];
                                @endphp
                                <input type="text" class="form-control bg-soft-success text-dark border-0 py-0 text-center" style="font-weight: bold" value="{{number_format($jlh_keluar,0,',','.')}}" disabled>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h6>H. Keadaan Guru / Pegawai</h6>
                    <div class="table-responsive mt-2">

                        <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 200%">
                            <thead class="text-center">
                                <tr>
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
                                    <th rowspan="2">Kepala SD</th>
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
                                        <td>{{$i+1}}</td>
                                        <td>{{$item['nip']}}</td>
                                        <td>{{$item['nama']}}</td>
                                        <td>{{$item['tempat_lahir']}}</td>
                                        <td>{{$item['tgl_lahir']}}</td>
                                        <td>{{$item['gender']}}</td>
                                        <td>{{$item['ijazah']}}</td>
                                        <td>{!!$item['jabatan']=='Kepala SD'?'&check;':'-'!!}</td>
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
            </div>

        </div>
    </div>
</div>
