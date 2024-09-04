<div>

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
                <input type="text" wire:model.live="form.data_dana.data.sbpp_terima" class="form-control text-center only-number">
            </div>
            <div class="form-group text-center">
                <input type="text" wire:model.live="form.data_dana.data.op_terima" class="form-control text-center only-number">
            </div>
            <div class="form-group text-center">
                <input type="text" wire:model.live="form.data_dana.data.bp3_terima" class="form-control text-center only-number">
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
                <input type="text" wire:model.live="form.data_dana.data.sbpp_keluar" class="form-control text-center only-number">
            </div>
            <div class="form-group text-center">
                <input type="text" wire:model.live="form.data_dana.data.op_keluar" class="form-control text-center only-number">
            </div>
            <div class="form-group text-center">
                <input type="text" wire:model.live="form.data_dana.data.bp3_keluar" class="form-control text-center only-number">
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

</div>
