@component('mail::message')

# Halo {{ $user->name }},
<p>Silahakan tekan reset password.</p>

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Reset Password
@endcomponent

<p>Jika Anda mengalami masalah dalam memulihkan kata sandi Anda, silakan hubungi kami.<p>
Terimakasih,
<br>
{{ config('app.name') }}
@endcomponent
