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
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.kecil_7.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.kecil_7.{{$i}}.p">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.7_12.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.7_12.{{$i}}.p">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.13_15.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.13_15.{{$i}}.p">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.besar_16.{{$i}}.l">
                                </td>
                                <td>
                                    <input type="text" style="width:100%" class="text-center only-number"
                                        wire:model.live="form.data_usia.data.besar_16.{{$i}}.p">
                                </td>

                                <td></td>
                                {{-- @for ($ia=0;$ia<$dt['jlh_kelas'];$ia++)
                                    <td>
                                        <input type="text" style="width:100%" class="text-center only-number"
                                            wire:model.live="form.data_usia.data.kecil_7.{{$ia}}.l">
                                    </td>
                                @endfor --}}
                                <td></td>
                                <td></td>
                            </tr>
                        @endfor
                        <tr>
                            <th>Jumlah</th>
                            <th>0</th><th>0</th>
                            <th>0</th><th>0</th>
                            <th>0</th><th>0</th>
                            <th>0</th><th>0</th>
                            <th>0</th><th>0</th><th>0</th>
                        </tr>
                        <tr>
                            <th style="min-width: 100px">Jumlah (L+P)</th>
                            <th colspan="2">0</th>
                            <th colspan="2">0</th>
                            <th colspan="2">0</th>
                            <th colspan="2">0</th>
                            <th colspan="2">0</th>
                            <th>0</th>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @include('mods.laporan.atc.laporan_create_usia_atc')

</div>
