<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">{{ SeoHelper::getTitle() }}</h4>
                <p class="card-text mb-1">{!! BaseHelper::clean(__('Please enter the OTP code sent to :identifier.', ['identifier' => "<strong>$identifier</strong>"])) !!}</p>
                <p class="card-text expiry-time">
                    {!! BaseHelper::clean(__('The OTP code will expire in :time.', ['time' => "<span></span>"])) !!}
                </p>

                {!! $form->renderForm() !!}
            </div>
        </div>
    </div>
</div>

<x-core::form
    :url="route('otp.resend')"
    method="post"
    id="resend-otp-form"
    style="display: none;"
/>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var expiryTime = '{{ $expiryTime->getTimestamp() }}' * 1000;
        var element = document.querySelector('.expiry-time > span');

        function updateExpiryTime() {
            var now = new Date().getTime();
            var distance = expiryTime - now;

            if (distance < 0) {
                document.querySelector('.expiry-time').style.display = 'none';
            }

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (seconds < 10) {
                seconds = '0' + seconds;
            }

            element.style.fontWeight = 'bold';
            element.innerText = `${minutes}:${seconds}`;
        }

        setInterval(function () {
            updateExpiryTime();
        }, 1000);

        updateExpiryTime();
    });
</script>
