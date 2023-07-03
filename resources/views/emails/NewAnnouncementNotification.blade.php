@component('mail::message')

{{$announcment}}

@if (strpos($announcment, 'new message') === 0)
    @component('mail::button', ['url' => 'http://localhost:4200/FCAIChat'])
        View Message
    @endcomponent
@else
    @component('mail::button', ['url' => 'http://localhost:4200/Announcements'])
        View Announcement
    @endcomponent
@endif

@endcomponent