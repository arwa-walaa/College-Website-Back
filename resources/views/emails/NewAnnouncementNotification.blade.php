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


Click on this button to view the announcement

@component('mail::button', ['url' => 'http://localhost:4200/Announcements'])
View announcement
@endcomponent


@endcomponent