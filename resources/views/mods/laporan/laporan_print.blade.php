<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <style>
        html, body{
            font-family: 'Times New Roman', Times, serif;
            font-size: 6.7px;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        table {
            /* width: 100%; */
            border-collapse: collapse; /* Menggabungkan border */
        }

        th, td {

        }

        table.kop th, table.kop td {
            /* text-align: left; */
        }

        table.nss th, table.nss td {
            border: 1px solid black;
            padding: 4px 6px;
        }

        /* Gaya cetak khusus */
        @media print {
            @page {
                size: A4 landscape; /* Ukuran kertas A4 dengan orientasi landscape */
                margin: 1cm;        /* Margin 1 cm di semua sisi */
            }

            body {
                width: auto;
                height: auto;
                margin: 0;
                padding: 0;
                /* Gaya lain untuk versi cetak */
            }

            h2.title{
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                padding: 0px;
                margin: 0px;
                border-bottom: 2px solid black;
            }

            /* table {
                page-break-before: always;
                break-before: page;
            } */

        }

        /* Gaya layar untuk pre-preview */
        @media screen {
            body {
                width: 29.7cm;
                height: 21cm;
                margin: auto;
                padding: 1cm;
                background: white;
                border-left: 1px solid #ccc;
                border-right: 1px solid #ccc;
                /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
                margin-top: 10px;
            }

            h2.title {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                padding: 0px;
                margin: 0px;
                border-bottom: 2px solid black;
            }

            .text-center {
                text-align: center;
            }

            .text-left {
                text-align: left;
            }
        }
    </style>
</head>
{{-- <body> --}}
<body onload="window.print()">
    @php
        $nssDigits = str_split($data['laporan']['sekolah']['nss']);
        $npsnDigits = str_split($data['laporan']['sekolah']['npsn']);
        $maxDigits = max(count($nssDigits), count($npsnDigits));
    @endphp


    <div style="position: relative;">

        <h2 class="title" style="">
            DAFTAR LAPORAN BULANAN {{$data['laporan']['sekolah']['jenis_sekolah']}}
        </h2>

        <table class="nss" style="position: absolute; right: 0px;">
            <tr>
                <td>NSS</td>
                @foreach($nssDigits as $digit)
                    <td>{{ $digit }}</td>
                @endforeach
                <!-- Tambahkan kotak kosong jika NSS kurang dari maxDigits -->
                @for($i = count($nssDigits); $i < $maxDigits; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <td>NPSN</td>
                @foreach($npsnDigits as $digit)
                    <td>{{ $digit }}</td>
                @endforeach
                <!-- Tambahkan kotak kosong jika NPSN kurang dari maxDigits -->
                @for($i = count($npsnDigits); $i < $maxDigits; $i++)
                    <td></td>
                @endfor
            </tr>
        </table>


        <table style="width: 100%;" class="kop" >
            <tr>
                <td colspan="9"><strong>DINAS PENDIDIKAN DAN KEBUDAYAAN</strong></td>
            </tr>
            <tr>
                <td style="width: 100px">NAMA SEKOLAH</td>
                <td style="width: 5px">:</td>
                <td colspan="7"><strong>{{$data['laporan']['sekolah']['nama_sekolah']}}</strong></td>
            </tr>
            <tr>
                <td style="width: 100px">NEGERI NON INPRES</td>
                <td style="width: 5px">:</td>
                <td colspan="7">
                    @if ($data['laporan']['sekolah']['status_sekolah']=='NEGERI NON INPRES')
                    @php
                        if($data['laporan']['sekolah']['status_desa']=="IDT"){
                            $string = "IDT / <s>Non IDT</s>";
                        }else{
                            $string = "<s>IDT</s> / Non IDT";
                        }
                    @endphp
                    <strong>Negeri</strong>, Jalan : {{$data['laporan']['sekolah']['jalan']}}  Desa : {{$data['laporan']['sekolah']['nama_desa']}} (Desa {!! $string !!} *)
                    @else
                    …………………….,, …………………………,, ….	: ……………………..
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 100px">NEGERI INPRES</td>
                <td style="width: 5px">:</td>
                <td colspan="7">
                    @if ($data['laporan']['sekolah']['status_sekolah']=='NEGERI INPRES')
                    @php
                        if($data['laporan']['sekolah']['status_desa']=="IDT"){
                            $string = "IDT / <s>Non IDT</s>";
                        }else{
                            $string = "<s>IDT</s> / Non IDT";
                        }
                    @endphp
                    <strong>Negeri</strong>, Jalan : {{$data['laporan']['sekolah']['jalan']}}  Desa : {{$data['laporan']['sekolah']['nama_desa']}} (Desa {!! $string !!} *)
                    @else
                    …………………….,, …………………………,, ….	: ……………………..
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 100px">SWASTA</td>
                <td style="width: 5px">:</td>
                <td colspan="7">
                    @if ($data['laporan']['sekolah']['status_sekolah']=='SWASTA')
                    @php
                        if($data['laporan']['sekolah']['status_desa']=="IDT"){
                            $string = "IDT / <s>Non IDT</s>";
                        }else{
                            $string = "<s>IDT</s> / Non IDT";
                        }
                    @endphp
                    <strong>Swasta</strong>, Jalan : {{$data['laporan']['sekolah']['jalan']}}  Desa : {{$data['laporan']['sekolah']['nama_desa']}} (Desa {!! $string !!} *)
                    @else
                    …………………….,, …………………………,, ….	: ……………………..
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width: 200px">TAHUN PENDIRIAN SEKOLAH : <strong>{{$data['laporan']['sekolah']['tahun_pendirian']}}</strong></td>
                <td style="width: 60px">UNTUK BULAN</td>
                <td style="width: 5px">:</td>
                <td colspan="4"><strong>{{ $data['laporan']['bln_laporan'] }} {{ $data['laporan']['thn_laporan'] }}</strong></td>
            </tr>
            <tr>
                <td style="width: 100px">DAERAH TINGKAT II</td>
                <td style="width: 5px">:</td>
                <td colspan="7"><strong>ACEH TIMUR</strong></td>
            </tr>
            <tr>
                @php
                    if($data['laporan']['sekolah']['kategori_gugus']=="INTI"){
                        $string = "INTI / <s>INBAS</s> / <s>BUKAN INTI BUKAN INBAS</s>";
                    }else if($data['laporan']['sekolah']['kategori_gugus']=="INBAS"){
                        $string = "<s>INTI</s> / INBAS / <s>BUKAN INTI BUKAN INBAS</s>";
                    }else{
                        $string = "<s>INTI</s> / <s>INBASS</s> / BUKAN INTI BUKAN INBA";
                    }
                @endphp
                <td colspan="6" style="width: 200px">KATAGORI PELAKSANAAN GUGUS SEKOLAH : {!!$string!!} *)</td>
                <td style="width: 110px">KECAMATAN</td>
                <td style="width: 5px">:</td>
                <td><strong>{{ $data['laporan']['sekolah']['kecamatan'] }}</strong></td>
            </tr>
            <tr>
                <td colspan="3" style="width: 200px">JARAK SEKOLAH INI DENGAN KANTOR CAMAT : {{$data['laporan']['sekolah']['jarak_ke_camat']}} Km</td>
                <td style="width: 60px">No. AGENDA</td>
                <td style="width: 5px">:</td>
                <td><strong>{{$data['laporan']['sekolah']['no_agenda']}}</strong></td>
                <td style="width: 110px">KANIN / KANDEP DIKBUD KEC</td>
                <td style="width: 5px">:</td>
                <td><strong>{{$data['laporan']['sekolah']['kanin']}}</strong></td>
            </tr>
            <tr>
                @php
                    if($data['laporan']['sekolah']['status_bangunan']=="SEWA"){
                        $string = "<s>GEDUNG MILIK SENDIRI</s> / <s>MENUMPANG</s> / SEWA";
                    }else if($data['laporan']['sekolah']['status_bangunan']=="MENUMPANG"){
                        $string = "<s>GEDUNG MILIK SENDIRI</s> / MENUMPANG / <s>SEWA</s>";
                    }else{
                        $string = " GEDUNG MILIK SENDIRI / <s>MENUMPANG</s> / <s>SEWA</s>";
                    }
                @endphp
                <td style="width: 100px">BANGUNAN</td>
                <td style="width: 5px">:</td>
                <td colspan="4">{!! $string !!} *)</td>
                <td>PENILIK TK / SD / SLTP</td>
                <td style="width: 5px">:</td>
                <td><strong>{{ $data['laporan']['sekolah']['penilik'] }}</strong></td>
            </tr>

        </table>
    </div>
    <hr>

    <table style="width: 100%">
        <tr>
            <td style="width: 50%;vertical-align: top">

                <table border="1" style="width: 100%">
                    <thead class="text-center text-dark" style="font-weight: bold;">
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
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Murid Mengulang Tahun ini</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['murid_mengulang'][$i]['l'];
                                $total_p += $form['data_murid']['data']['murid_mengulang'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['murid_mengulang'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['murid_mengulang'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Pada akhir bulan lalu</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['murid_bulan_lalu'][$i]['l'];
                                $total_p += $form['data_murid']['data']['murid_bulan_lalu'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['murid_bulan_lalu'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['murid_bulan_lalu'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Keluar bulan ini</td>
                            <td colspan="{{$dt['jlh_kelas']*2+2}}"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">&nbsp;&nbsp;&nbsp; a. Pindah sekolah</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['pindah'][$i]['l'];
                                $total_p += $form['data_murid']['data']['pindah'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['pindah'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['pindah'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">&nbsp;&nbsp;&nbsp; b. Putus sekolah</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['putus'][$i]['l'];
                                $total_p += $form['data_murid']['data']['putus'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['putus'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['putus'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">&nbsp;&nbsp;&nbsp; c. Meninggal</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['mati'][$i]['l'];
                                $total_p += $form['data_murid']['data']['mati'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['mati'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['mati'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>

                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Masuk bulan ini</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['masuk'][$i]['l'];
                                $total_p += $form['data_murid']['data']['masuk'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['masuk'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['masuk'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Jumlah yang naik kelas</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['naik'][$i]['l'];
                                $total_p += $form['data_murid']['data']['naik'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['masuk'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['masuk'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Jumlah yang tidak naik kelas</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['data']['tidak_naik'][$i]['l'];
                                $total_p += $form['data_murid']['data']['tidak_naik'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['data']['tidak_naik'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['data']['tidak_naik'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>

                        {{-- total --}}
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Jumlah pada akhir bulan ini</td>
                            @php $total_l = 0;$total_p = 0;@endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_murid']['total']['jlh_bulan_ini'][$i]['l'];
                                $total_p += $form['data_murid']['total']['jlh_bulan_ini'][$i]['p'];
                            @endphp
                            <td><center>{{$form['data_murid']['total']['jlh_bulan_ini'][$i]['l']}}</center></td>
                            <td><center>{{$form['data_murid']['total']['jlh_bulan_ini'][$i]['p']}}</center></td>
                            @endfor
                            <td><center>{{$total_l}}</center></td><td><center>{{$total_p}}</center></td><td></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left">Jumlah seluruhnya (L + P)</td>
                            @php $total_lp=0; @endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_lp += $form['data_murid']['total']['jlh_bulan_ini'][$i]['lp'];
                            @endphp
                            <td colspan="2"><center>{{$form['data_murid']['total']['jlh_bulan_ini'][$i]['lp']}}</center></td>
                            @endfor
                            <td colspan="2"><center>{{$total_lp}}</center></td>
                            <td><center>{{$total_lp}}</center></td>
                        </tr>
                        <tr>
                            <td class="text-left text-dark" style="font-weight: bolder; text-align: left; min-width: 240px;">Jumlah kelas (Rombongan belajar)</td>
                            @php $total_kelas=0; @endphp
                            @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_kelas += $form['data_murid']['data']['kelas'][$i]['jlh'];
                            @endphp
                            <td colspan="2"><center>{{$form['data_murid']['data']['kelas'][$i]['jlh']}}</center></td>
                            @endfor
                            <td colspan="2"><center>{{$total_kelas}}</center></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>


                <table style="width: 100%;margin: 0;padding: 0">
                    <tr>
                        <td style="width: 50%; margin: 0;left: -1px;position: relative">
                            <h3 style="margin: 5px 0px 0px 0px; text-align: left"><strong>B. AGAMA</strong></h3>
                            <table border="1" style="width: 100%">
                                <thead class="text-center text-dark" style="font-weight: bold">
                                    <tr>
                                        <th rowspan="3">MURID</th>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left">1. Islam</td>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left">2. Katolik</td>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left">3. Protestan</td>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left">4. Hindu</td>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left">5. Budha</td>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left">JUMLAH</td>
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
                                        <td class="text-left text-dark" style="font-weight: bolder; text-align: left; min-width: 110px">JUMLAH (L+P)
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

                            <h3 style="margin: 5px 0px 0px 0px;border-bottom: 1px solid black; text-align: left"><strong>C. ABSEN MURID</strong></h3>
                            <table style="width: 100%">
                                <tr>
                                    <td width="10">1.</td>
                                    <th colspan="4" style="text-align: left">JUMLAH HARI SEKOLAH = {{$dt['hari']}} Hari</th>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <th colspan="4" style="text-align: left">ABSEN</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th style="text-align: left">Sakit</th>
                                    <td>:</td>
                                    <td class="text-center">{{$form['data_absen']['data']['sakit']}} Hari = </td>
                                    <td>{{ number_format($form['data_absen']['data']['sakit']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th style="text-align: left">Izin</th>
                                    <td>:</td>
                                    <td class="text-center">{{$form['data_absen']['data']['izin']}} Hari = </td>
                                    <td>{{ number_format($form['data_absen']['data']['izin']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th style="text-align: left">Alpa</th>
                                    <td>:</td>
                                    <td class="text-center">{{$form['data_absen']['data']['alpa']}} Hari = </td>
                                    <td>{{ number_format($form['data_absen']['data']['alpa']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                                <tr style="border-top: 1px solid black">
                                    <td></td>
                                    <th>Jumlah</th>
                                    <th>:</th>
                                    <th>{{$form['data_absen']['total']}} Hari = </th>
                                    <td>{{ number_format($form['data_absen']['total']/$dt['hari']*100,2,',',',' ) }} %</td>
                                </tr>
                            </table>

                            <h3 style="margin: 5px 0px 0px 0px; text-align: left"><strong>D. WAKTU BELAJAR : (diisi ya atau tidak)</strong></h3>
                            <table border="1" style="width: 100%">
                                <tr>
                                    <th style="text-align: left">1. Pagi</th>
                                    <td style="text-align: center">08:00 - 13:00</td>
                                    <td style="text-align: center">{{$form['data_waktu']['data']['pagi']?'Ya':'-'}}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">2. Sore</th>
                                    <td style="text-align: center">13:00 - 18:00</td>
                                    <td style="text-align: center">{{$form['data_waktu']['data']['sore']?'Ya':'-'}}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">3. Pagi dan Sore</th>
                                    <td style="text-align: center">08:00 - 18:00</td>
                                    <td style="text-align: center">{{$form['data_waktu']['data']['pagi_sore']?'Ya':'-'}}</td>
                                </tr>
                            </table>
                        </td>

                        <td style="vertical-align: top">
                            <h3 style="margin: 5px 0px 0px 0px; text-align: left"><strong>E. USIA MURID</strong></h3>
                            <table border="1" style="width: 100%">
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
                        </td>
                    </tr>
                </table>

            </td>

            <td style="vertical-align: top">

                <h3 style="margin: 0px 0px 0px 0px; text-align: left"><strong>F. INVENTARIS</strong></h3>
                <table style="width: 100%" border="0">
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i1a']}}</td>
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i1c_r_kelas']}}</td>
                        <td>Buah</td>
                        <td>R. Kep Sek</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i1c_r_kepsek']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="3"></td>
                        <td>Ruang Guru</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i1c_r_guru']}}</td>
                        <td>Buah</td>
                        <td>R. Pustaka</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i1c_r_pustaka']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="3"></td>
                        <td>Ruang UKS</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i1c_r_uks']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    {{-- 2 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 2px"></td>
                    </tr> --}}
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i2a_permanen']}}</td>
                        <td>Buah</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2a_semi']}}</td>
                        <td>Buah</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2a_darurat']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>b.</td>
                        <td>Menumpang</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2b_permanen']}}</td>
                        <td>Buah</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2b_semi']}}</td>
                        <td>Buah</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2b_darurat']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>c.</td>
                        <td>Sewa</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2c_permanen']}}</td>
                        <td>Buah</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2c_semi']}}</td>
                        <td>Buah</td>
                        <td>=</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i2c_darurat']}}</td>
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
                    {{-- <tr style="border-top: 1px solid black">
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i3a_permanen']}}</td>
                        <td>Buah ruang</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i3a_semi']}}</td>
                        <td>Buah ruang</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i3a_darurat']}}</td>
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i3b_permanen']}}</td>
                        <td>Buah ruang</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i3b_semi']}}</td>
                        <td>Buah ruang</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i3b_darurat']}}</td>
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i3c_permanen']}}</td>
                        <td>Buah ruang</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i3c_semi']}}</td>
                        <td>Buah ruang</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i3c_darurat']}}</td>
                        <td>Buah ruang</td>
                        <td></td>
                        <td></td>
                    </tr>

                    {{-- 4 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>4.</td>
                        <td>a.</td>
                        <td colspan="2">Luas tanah sekolah : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i4a']}}</td>
                        <td colspan="7">M<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>b.</td>
                        <td colspan="2">Luas bangunan seluruhnya :  </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i4b']}}</td>
                        <td colspan="7">M<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>c.</td>
                        <td colspan="2">Luas tanah yang belum terpakai :  </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i4c']}}</td>
                        <td colspan="7">M<sup>2</sup></td>
                    </tr>

                    {{-- 5 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
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
                        <td class="text-center">{{$form['data_inventaris']['data']['i5a_item']}}</td>
                        <td>unit</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5a_luas']}}</td>
                        <td>M<sup>2</sup></td>
                        <td>tahun:</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5a_tahun']}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>b.</td>
                        <td>Rehab berat</td>
                        <td colspan="2">:</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5b_item']}}</td>
                        <td>unit</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5b_luas']}}</td>
                        <td>M<sup>2</sup></td>
                        <td>tahun:</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5b_tahun']}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>c.</td>
                        <td>Rehab ringan</td>
                        <td colspan="2">:</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5c_item']}}</td>
                        <td>unit</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5c_luas']}}</td>
                        <td>M<sup>2</sup></td>
                        <td>tahun:</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i5b_tahun']}}</td>
                        <td></td>
                    </tr>

                    {{-- 6 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>6.</td>
                        <td colspan="11">
                            Pagar pekarangan {{$dt['laporan']['sekolah']['jenis_sekolah']}}
                            ({{$form['data_inventaris']['data']['i6']}})

                        </td>
                    </tr>

                    {{-- 7 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>7.</td>
                        <td colspan="3">Rumah Dinas Kepala {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i7_qty']}}</td>
                        <td>Buah,</td>
                        <td>baik : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i7_baik']}}</td>
                        <td>Buah,</td>
                        <td>rusak : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i7_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="11">Dipergunakan oleh (Kepsek, Guru, PS, dll )</td>
                    </tr>

                    {{-- 8 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>8.</td>
                        <td colspan="3">Rumah Dinas Guru {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i8_qty']}}</td>
                        <td>Buah,</td>
                        <td>baik : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i8_baik']}}</td>
                        <td>Buah,</td>
                        <td>rusak : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i8_rusak']}}</td>
                        <td>Buah</td>
                    </tr>

                    {{-- 9 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>9.</td>
                        <td colspan="3">Rumah Dinas Pesuruh {{$dt['laporan']['sekolah']['jenis_sekolah']}}</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i9_qty']}}</td>
                        <td>Buah,</td>
                        <td>baik : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i9_baik']}}</td>
                        <td>Buah,</td>
                        <td>rusak : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i9_rusak']}}</td>
                        <td>Buah</td>
                    </tr>

                    {{-- 10 --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>10.</td>
                        <td colspan="2">Status Tanah {{$dt['laporan']['sekolah']['jenis_sekolah']}} :</td>
                        <td>a.</td>
                        <td colspan="2">Tanah Negara Sertifikat No</td>
                        <td colspan="6">{{$form['data_inventaris']['data']['i10a']}}</td>
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
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
                    <tr>
                        <td></td>
                        <td>11.</td>
                        <td colspan="3">WC : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i11_qty']}}</td>
                        <td>Buah,</td>
                        <td>baik : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i11_baik']}}</td>
                        <td>Buah,</td>
                        <td>rusak : </td>
                        <td class="text-center">{{$form['data_inventaris']['data']['i11_rusak']}}</td>
                        <td>Buah</td>
                    </tr>


                    {{-- II --}}
                    {{-- <tr>
                        <td colspan="13" style="height: 0px"></td>
                    </tr> --}}
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
                        <td class="text-center">{{$form['data_inventaris']['data']['ii1_qty']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii1_baik']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii1_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2.</td>
                        <td colspan="3">Meja murid (2 orang)</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii2_qty']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii2_baik']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii2_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3.</td>
                        <td colspan="3">Bangku murid (1 orang)</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii3_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii3_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii3_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4.</td>
                        <td colspan="3">Meja murid (1 orang)</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii4_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii4_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii4_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5.</td>
                        <td colspan="3">Meja Guru</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii5_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii5_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii5_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>6.</td>
                        <td colspan="3">Kursi guru</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii6_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii6_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii6_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>7.</td>
                        <td colspan="3">Lemari</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii7_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii7_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii7_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>8.</td>
                        <td colspan="3">Papan tulis</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii8_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii8_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii8_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>9.</td>
                        <td colspan="3">Pengeras suara</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii9_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii9_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii9_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>10.</td>
                        <td colspan="3">Buku paket murid</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii10_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii10_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii10_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>11.</td>
                        <td colspan="3">Buku pegangan guru</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii11_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii11_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii11_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>12.</td>
                        <td colspan="3">Buku pustaka</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii12_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii12_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii12_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>13.</td>
                        <td colspan="3">Alat kesenian</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii13_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii13_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii13_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>14.</td>
                        <td colspan="3">Alat olah raga</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii14_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii14_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii14_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>15.</td>
                        <td colspan="3">Alat peraga matematika</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii15_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii15_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii15_rusak']}}</td>
                        <td>Buah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>16.</td>
                        <td colspan="3">Alat Peraga IPA</td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii16_rusak']}}</td>
                        <td>Buah</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii16_rusak']}}</td>
                        <td>Baik</td>
                        <td></td>
                        <td class="text-center">{{$form['data_inventaris']['data']['ii16_rusak']}}</td>
                        <td>Buah</td>
                    </tr>


                </table>

                <h3 style="margin: 5px 0px 0px 0px; text-align: left"><strong>G. DANA</strong></h3>
                <table style="width: 100%" border="0">
                    <tr>
                        <td colspan="2">Jenis Dana</td>
                        <td>Penerimaan</td>
                        <td>Pengeluaran</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>a. SBPP</td>
                        <td>Rp {{number_format($form['data_dana']['data']['sbpp_terima'])}}</td>
                        <td>Rp {{number_format($form['data_dana']['data']['sbpp_keluar'])}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>b. OP</td>
                        <td>Rp {{number_format($form['data_dana']['data']['op_terima'])}}</td>
                        <td>Rp {{number_format($form['data_dana']['data']['op_keluar'])}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>c. BP3</td>
                        <td>Rp {{number_format($form['data_dana']['data']['bp3_terima'])}}</td>
                        <td>Rp {{number_format($form['data_dana']['data']['bp3_keluar'])}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>JUMLAH</td>
                        @php
                            $jlh_terima =
                                $form['data_dana']['data']['sbpp_terima'] +
                                $form['data_dana']['data']['op_terima'] +
                                $form['data_dana']['data']['bp3_terima'];
                        @endphp
                        <td>Rp {{$jlh_terima}}</td>
                        @php
                            $jlh_keluar =
                                $form['data_dana']['data']['sbpp_keluar'] +
                                $form['data_dana']['data']['op_keluar'] +
                                $form['data_dana']['data']['bp3_keluar'];
                        @endphp
                        <td>Rp {{$jlh_keluar}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div style="page-break-inside: avoid;page-break-after: always">
        <table  style="width:100%;" border="1">
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
                        <td>{{$form['data_guru']['data'][$i]['gol_thn']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['gol_bln']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['all_thn']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['all_bln']}}</td>
                        <td>{{$item['agama']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['sakit']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['izin']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['alpa']}}</td>
                        <td>
                            @php
                                $jlh = $form['data_guru']['data'][$i]['sakit']+
                                    $form['data_guru']['data'][$i]['izin']+
                                    $form['data_guru']['data'][$i]['alpa'];
                            @endphp
                            {{$jlh}}
                        </td>
                        <td>{{$form['data_guru']['data'][$i]['istri_suami']}}</td>
                        <td>{{$form['data_guru']['data'][$i]['anak']}}</td>
                        <td>{{$item['ket']}}</td>
                    </tr>
                @endforeach
            </tbody>


        </table>

        <div style="height: 50px"></div>
        <table style="width: 100%" border="0">
            <tr>
                <td style="width: 350px">
                    <span>Dikirimkan kepada :</span><br>
                    <span>1. Kepala Dinas P dan K Propinsi Nanggroe Aceh Darussalam</span><br>
                    <span>2. Kepala Kakawil Prov. NAD UP Bidang Pendidikan Dasar di Banda Aceh</span><br>
                    <span>3. Kepala Kantor Dinas Pendidikan dan Kebudayaan</span><br>
                    <span>4. Kepala Unit Pelaksana Teknis Dinas P dan K Peureulak</span><br>
                    <span>5. Pertinggal</span>
                    <hr>
                    <table>
                        <tr>
                            <td style="vertical-align: top;width: 60px">Catatan : Untuk</td>
                            <td style="vertical-align: top">1)</td>
                            <td style="vertical-align: top">
                                Guru Pegawai Yang tidak Bertugas menurut SK <br>
                                (Guru Nota Tugas/Dinas Dan Sebagainya)
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"></td>
                            <td style="vertical-align: top">2)</td>
                            <td style="vertical-align: top">
                                Guru Bakti/Suka Rela <br>
                                supaya di catat dalam kolom keterangan (kolom 28)
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"></td>
                            <td style="vertical-align: top">3)</td>
                            <td style="vertical-align: top">
                                Kolom 6,7,8,9, dan 10 di isi tanda petik
                            </td>
                        </tr>
                    </table>
                </td>

                <td>

                </td>

                <td style="width: 300px;vertical-align: top;text-align: center">
                    <span>{{$dt['laporan']['sekolah']['nama_desa']}}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span><br>
                    <span>Ka. {{$data['laporan']['sekolah']['nama_sekolah']}}</span>
                    <div style="height: 80px"></div>
                    <span style="text-decoration: underline"><strong>{{$dt['kepala']}}</strong></span><br>
                    <span><strong>{{$dt['nip']}}</strong></span>
                </td>

                <td style="width: 50px"></td>
            </tr>
        </table>
    </div>


</body>
</html>
