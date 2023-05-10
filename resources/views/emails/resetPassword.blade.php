{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'http://localhost:4200/response-password-reset?token='.$token">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}


@component('mail::message')


Click on this button to reset your password

@component('mail::button', ['url' => 'http://localhost:4200/resetPassword?token='.$token])
Reset Password
@endcomponent


@endcomponent