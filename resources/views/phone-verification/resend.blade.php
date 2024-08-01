<p class="card-text mt-3">
    {{ __("Didn't receive the OTP?") }}
    <a
        href="javascript:void(0);"
        onclick="event.preventDefault(); document.querySelector('#resend-otp-form').submit();"
        class="text-primary"
    >
        {{ __('Resend OTP') }}
    </a>
</p>
