@component('mail::message')

@if(config('app.logo'))
<img src="{{ asset(config('app.logo')) }}" alt="{{ config('app.name') }} Logo" style="max-width: 200px; margin: 0 auto; display: block; margin-bottom: 20px;">
@endif

# Hello {{ $user->name }},

Thank you for signing up for {{ config('app.name') }}. We're thrilled to have you on board!

To ensure the security of your account and enable full access to our platform, we need to verify your email address. Please click the verification link sent to your email. The link is valid for 10 minutes.

Please verify your email by clicking the button below:

@component('mail::button', ['url' => $verificationUrl])
Verify Email
@endcomponent

---

### Why Verify Your Email?
- Protect your account from unauthorized access.
- Access premium features and personalized content.
- Stay updated with the latest offers and notifications.

If you did not initiate this request, please disregard this email or contact our support team.

---

{{-- Footer Section --}}
Thank you for choosing {{ config('app.name') }}!

{{ config('app.name') }} Team

@component('mail::subcopy')
If you’re having trouble clicking the "Verify Email" button, copy and paste the following URL into your web browser: [{{ $verificationUrl }}]({{ $verificationUrl }})
@endcomponent
@endcomponent
