{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}


@component('mail::message')

{{$announcment}}

@component('mail::button', ['url' => 'http://localhost:4200/Announcements'])
View announcement
@endcomponent


@endcomponent