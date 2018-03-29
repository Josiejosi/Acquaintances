@component('mail::message')
# Email Verification

<h1>Click the Link To Verify Your Email</h1>
Click the following link to verify your email:

@component('mail::button', [ 'url' => url( '/verify/' . $user->email_token ) ])
Verify
@endcomponent

{{ url( '/verify/' . $user->email_token ) }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
