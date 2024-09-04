<x-mail::message>
<h1> Forget Password Email</h1>

    You can reset password from bellow link:

<x-mail::button :url="route('reset.password.get', $reset_token)">
    Reset Password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
    <hr>

    If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:{{ route('reset.password.get', $reset_token) }}
</x-mail::message>

