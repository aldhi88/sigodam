<div>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-2">
                        <table id="myTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th class="text-center" width="10"></th>
                                <th class="text-center">Sekolah</th>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center" style="max-width: 150px">Status</th>
                            </tr>
                            </thead>

                            <thead id="header-filter">
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">
                                        <input type="text" class="form-control form-control-sm text-center search-col-dt only-number">
                                    </th>
                                    <th class="text-center">
                                        <select class="form-control form-control-sm text-center search-col-dt">
                                            <option value="">Semua</option>
                                            @foreach ($select['bulan'] as $i=>$item)
                                                <option value="{{$i+1}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th class="text-center">
                                        <input type="text" class="form-control form-control-sm text-center search-col-dt only-number">
                                    </th>
                                    <th class="text-center">
                                        <select class="form-control form-control-sm text-center search-col-dt">
                                            <option value="">Semua</option>
                                            @foreach ($select['status'] as $i=>$item)
                                                <option value="{{$i}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </th>

                                </tr>
                            </thead>


                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @include('mods.laporan.atc.laporan_data_admin_disetujui_atc')

</div>
