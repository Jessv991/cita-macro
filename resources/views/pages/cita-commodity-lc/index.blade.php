
@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #D0C9C7">
            <div class="row">
                <div class="col-lg-8 col-12 p-0">
                    <img class="w-100 h-100 active" src="{{ asset($data['LC']) }}">
                </div>
                <div class="style-form col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.form_lc')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
