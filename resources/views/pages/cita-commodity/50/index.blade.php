@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #D0C9C7">
            <div class="row">
                <div class="col-lg-8 col-12 p-0">
                    <img class="w-100 h-100 active" src="{{ asset($data['LC']) }}">
                </div>
                <div class="style-form col-lg-4 col-12 mt-lg-0 mt-3">
                    @if ($data['typeLC'] === 'email')
                        @include('form.form_lc')
                    @elseif($data['typeLC'] === 'sms')
                        @include('form.pide_cita')
                    @else
                        @include('form.pide_cita')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
