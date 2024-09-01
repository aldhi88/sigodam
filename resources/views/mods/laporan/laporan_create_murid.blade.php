<div>
    <div class="row">
        <div class="col">
            <div class="table-responsive mt-2">
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.murid_mengulang.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.murid_mengulang.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.murid_bulan_lalu.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.murid_bulan_lalu.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.pindah.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.pindah.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.putus.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.putus.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.mati.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.mati.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.masuk.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.masuk.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.naik.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.naik.{{$i}}.p">
                            </td>
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
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.tidak_naik.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.tidak_naik.{{$i}}.p">
                            </td>
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
                            <td colspan="2">
                                <input type="text" style="width:100%" class="text-center only-number"
                                    wire:model.live="form.data_murid.data.kelas.{{$i}}.jlh">
                            </td>
                            @endfor
                            <td colspan="2">{{$total_kelas}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @include('mods.laporan.atc.laporan_create_murid_atc')

</div>
