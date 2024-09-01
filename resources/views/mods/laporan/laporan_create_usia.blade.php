<div>
    <div class="row">
        <div class="col">
            <div class="table-responsive mt-2">
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
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.kecil_7.{{$i}}.l">

                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.kecil_7.{{$i}}.p">
                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.7_12.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.7_12.{{$i}}.p">
                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.13_15.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.13_15.{{$i}}.p">
                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.besar_16.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%; min-width:40px" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.besar_16.{{$i}}.p">
                                </td>

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

            </div>
        </div>
    </div>
    {{-- @include('mods.laporan.atc.laporan_create_usia_atc') --}}

</div>
