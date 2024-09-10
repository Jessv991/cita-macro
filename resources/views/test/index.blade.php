<div id="test" class="d-flex flex-column justify-content-center align-items-center p-4 rounded-20 bg-blue text-center w-100">

    <div id="quest" class="d-flex flex-column justify-content-center align-items-center">
        <div class="text-center mb-3 mb-md-5">
            <span class="lead fs-1 natural">{{ __('test.haz-test') }}</span>
        </div>

        <div class="d-block">
            <div class="py-2 px-5 m-2 bg-natural rounded-3" id="quest-button">
                <div class="test-buttons lead fs-2 fw-bold text-uppercase">{{ __('test.b-test') }}</div>
            </div>
        </div>
    </div>

    <div class="text-center d-none" id="quest-1">
        <div class="text-center mb-5">
            <span class="lead fs-1 natural">{{ __('test.question1') }}</span>
        </div>

        <div class="d-flex flex-column flex-xl-row flex-lg-row flex-md-row justify-content-around w-100">
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-1-v">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-check2"></i>{{ __('test.b-true') }}</div>
            </div>
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-1-f">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-x-lg"></i>{{ __('test.b-false') }}</div>
            </div>
        </div>
    </div>

    <div class="text-center d-none" id="quest-2">
        <div class="text-center mb-5">
            <span class="lead fs-1 natural">{{ __('test.question2') }}</span>
        </div>

        <div class="d-flex flex-column flex-xl-row flex-lg-row flex-md-row justify-content-around w-100">
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-2-v">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-check2"></i>{{ __('test.b-true') }}</div>
            </div>
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-2-f">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-x-lg"></i>{{ __('test.b-false') }}</div>
            </div>
        </div>
    </div>

    <div class="text-center d-none" id="quest-3">
        <div class="text-center mb-5">
            <span class="lead fs-1 natural">{{ __('test.question3') }}</span>
        </div>

        <div class="d-flex flex-column flex-xl-row flex-lg-row flex-md-row justify-content-around w-100">
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-3-v">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-check2"></i>{{ __('test.b-true') }}</div>
            </div>
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-3-f">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-x-lg"></i>{{ __('test.b-false') }}</div>
            </div>
        </div>
    </div>

    <div class="text-center d-none" id="quest-4">
        <div class="text-center mb-5">
            <span class="lead fs-1 natural">{{ __('test.question4') }}</span>
        </div>
        
        <div class="d-flex flex-column flex-xl-row flex-lg-row flex-md-row justify-content-around w-100">
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-4-v">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-check2"></i>{{ __('test.b-true') }}</div>
            </div>
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-4-f">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-x-lg"></i>{{ __('test.b-false') }}</div>
            </div>
        </div>
    </div>

    <div class="text-center d-none" id="quest-5">
        <div class="text-center mb-5">
            <span class="lead fs-1 natural">{{ __('test.question5') }}</span>
        </div>

        <div class="d-flex flex-column flex-xl-row flex-lg-row flex-md-row justify-content-around w-100">
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-5-v">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-check2"></i>{{ __('test.b-true') }}</div>
            </div>
            <div class="py-2 px-5  m-2 bg-natural rounded-3" id="quest-button-5-f">
                <div class="test-buttons lead fs-2 colr-text fw-bold"><i class="bi bi-x-lg"></i>{{ __('test.b-false') }}</div>
            </div>
        </div>
    </div>

    <div class="text-center d-none d-none" id="resultado-1">
        <div class="row m-2 mb-5 text-center w-100">
            <div class="col-12 col-xl-8 col-lg-8 w-100">
                <div class="lead fs-3 natural w-100">{{ __('test.respuesta_neg') }}</div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <div class="py-2 px-5  m-2 bg-natural rounded-3 reset" onclick="questReset(1)">
                <div class="lead fs-2 colr-text fw-bold"><i class="bi bi-arrow-repeat"></i> {{ __('test.b-reboot') }}</div>
            </div>
        </div>


    </div>

    <div class="text-center d-none" id="resultado-2">
        <div class="row m-2 mb-5 text-center w-100">
            <div class="col-12 col-xl-8 col-lg-8 w-100">
                <div class="lead fs-3 natural w-100">{{ __('test.respuesta_pos') }}</div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <div class="py-2 px-5  m-2 bg-natural rounded-3 reset" onclick="questReset(2)">
                <div class="lead fs-2 colr-text fw-bold"><i class="bi bi-arrow-repeat"></i> {{ __('test.b-reboot') }}</div>
            </div>
        </div>


    </div>

</div>