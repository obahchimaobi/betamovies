@component('mail::message')
{{-- Optional Logo --}}
@if(config('app.logo'))
<img src="{{ asset(config('app.logo')) }}" alt="{{ config('app.name') }} Logo" style="max-width: 200px; margin: 0 auto; display: block; margin-bottom: 20px;">
@endif

{{-- Greeting --}}
# Hello {{ $name }},

Your password has been successfully reset. Below is your new password:

@component('mail::panel')
**{{ $new_password }}**
@endcomponent

Please use this password to log in to your account. We recommend changing your password immediately after logging in to keep your account secure.

---

### Need Help?
If you did not initiate this request or believe this is an error, please contact our support team immediately.

---

{{-- Footer Section --}}
Thank you for choosing {{ config('app.name') }}!

{{ config('app.name') }} Team

@component('mail::subcopy')
If you have any questions or need further assistance, feel free to contact us at [support@{{ config('app.url') }}](mailto:support@{{ config('app.url') }}).
@endcomponent
@endcomponent
