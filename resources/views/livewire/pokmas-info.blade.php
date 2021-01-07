<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        <x-dg-small-box title="Verifikasi" text="{{ $verifikasi }} / {{ $totalPokmas }}"
            :icon="'fas fa-clipboard-check'" bg="warning" url="#" urlText="See More" id="pokmas-verifikasi" />

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <x-dg-small-box title="Survei" text="{{ $survei }} / {{ $totalPokmas }}" :icon="'fas fa-poll'" bg="info" url="#"
            urlText="See More" id="pokmas-survei" />
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <x-dg-small-box title="NPHD" text="{{ $nphd }} / {{ $totalPokmas }}" :icon="'fas fa-signature'" bg="success"
            url="#" urlText="See More" id="pokmas-nphd" />
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <x-dg-small-box title="LPJ" text="{{ $lpj }} / {{ $totalPokmas }}" :icon="'fas fa-flag-checkered'" bg="danger"
            url="#" urlText="See More" id="pokmas-lpj" />
    </div>
</div>
