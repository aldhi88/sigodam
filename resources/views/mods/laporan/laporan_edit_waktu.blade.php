<div>
    <hr>
    <div class="row mt-2">
        <div class="col">
            <div class="alert alert-secondary mb-0 text-center" role="alert">
                <h5>Kelas Pagi</h5>
                <h5 class="lead">08:00 - 13:00</h5>
                <div class="custom-control custom-checkbox" style="zoom: 120%">
                    <input type="checkbox" wire:model.live="form.data_waktu.data.pagi" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Ya</label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-secondary mb-0 text-center" role="alert">
                <h5>Kelas Sore</h5>
                <h5 class="lead">13:00 - 18:00</h5>
                <div class="custom-control custom-checkbox" style="zoom: 120%">
                    <input type="checkbox" wire:model.live="form.data_waktu.data.sore" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">Ya</label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-secondary mb-0 text-center" role="alert">
                <h5>Kelas Pagi & Sore</h5>
                <h5 class="lead">08:00 - 18:00</h5>
                <div class="custom-control custom-checkbox" style="zoom: 120%">
                    <input type="checkbox" wire:model.live="form.data_waktu.data.pagi_sore" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">Ya</label>
                </div>
            </div>
        </div>

    </div>
</div>
