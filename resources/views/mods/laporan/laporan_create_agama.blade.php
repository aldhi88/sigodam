<div>
    <div class="row">
        <div class="col">
            <div class="table-responsive mt-2">
                <table class="table table-sm m-0 table-bordered table-striped nowrap" style="width: 100%">
                    <thead class="text-center text-dark" style="font-weight: bold">
                    <tr>
                        <th rowspan="3">KEADAAN</th>
                        <th colspan="{{$dt['jlh_kelas']*2}}">KELAS</th>
                        <th rowspan="2" colspan="3">JUMLAH</th>
                    </tr>
                    <tr>
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            <th colspan="2">{{$dt['angkaRomawi'][$i]}}</th>
                        @endfor
                    </tr>
                    <tr>
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            <th>L</th><th>P</th>
                        @endfor
                        <th>L</th><th>P</th><th>L+P</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder">Islam</td>
                        @php $total_l = 0;$total_p = 0;@endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_agama']['data']['islam'][$i]['l'];
                                $total_p += $form['data_agama']['data']['islam'][$i]['p'];
                            @endphp
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.islam.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.islam.{{$i}}.p">
                            </td>
                        @endfor
                        <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                    </tr>
                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder">Katolik</td>
                        @php $total_l = 0;$total_p = 0;@endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_agama']['data']['katolik'][$i]['l'];
                                $total_p += $form['data_agama']['data']['katolik'][$i]['p'];
                            @endphp
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.katolik.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.katolik.{{$i}}.p">
                            </td>
                        @endfor
                        <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                    </tr>

                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder">Protestan</td>
                        @php $total_l = 0;$total_p = 0;@endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_agama']['data']['protestan'][$i]['l'];
                                $total_p += $form['data_agama']['data']['protestan'][$i]['p'];
                            @endphp
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.protestan.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.protestan.{{$i}}.p">
                            </td>
                        @endfor
                        <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                    </tr>
                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder">Hindu</td>
                        @php $total_l = 0;$total_p = 0;@endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_agama']['data']['hindu'][$i]['l'];
                                $total_p += $form['data_agama']['data']['hindu'][$i]['p'];
                            @endphp
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.hindu.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.hindu.{{$i}}.p">
                            </td>
                        @endfor
                        <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                    </tr>
                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder">Budha</td>
                        @php $total_l = 0;$total_p = 0;@endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_agama']['data']['budha'][$i]['l'];
                                $total_p += $form['data_agama']['data']['budha'][$i]['p'];
                            @endphp
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.budha.{{$i}}.l">
                            </td>
                            <td>
                                <input type="text" style="width:100%" class="text-center only-number"
                                       wire:model.live="form.data_agama.data.budha.{{$i}}.p">
                            </td>
                        @endfor
                        <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                    </tr>

                    {{-- total --}}
                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder">JUMLAH</td>
                        @php $total_l = 0;$total_p = 0;@endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_l += $form['data_agama']['total']['jlh_bulan_ini'][$i]['l'];
                                $total_p += $form['data_agama']['total']['jlh_bulan_ini'][$i]['p'];
                            @endphp
                            <td>{{$form['data_agama']['total']['jlh_bulan_ini'][$i]['l']}}</td>
                            <td>{{$form['data_agama']['total']['jlh_bulan_ini'][$i]['p']}}</td>
                        @endfor
                        <td>{{$total_l}}</td><td>{{$total_p}}</td><td></td>
                    </tr>
                    <tr>
                        <td class="text-left text-dark" style="font-weight: bolder; min-width: 110px">JUMLAH (L+P)</td>
                        @php $total_lp=0; @endphp
                        @for ($i=0;$i<$dt['jlh_kelas'];$i++)
                            @php
                                $total_lp += $form['data_agama']['total']['jlh_bulan_ini'][$i]['lp'];
                            @endphp
                            <td colspan="2">{{$form['data_agama']['total']['jlh_bulan_ini'][$i]['lp']}}</td>
                        @endfor
                        <td colspan="2">{{$total_lp}}</td>
                        <td>{{$total_lp}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @include('mods.laporan.atc.laporan_create_agama_atc')

</div>
