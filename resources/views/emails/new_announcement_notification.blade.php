
@component('mail::message')


Click on this button to view the announcement

@component('mail::button', ['url' => 'http://localhost:4200/getAllAnnouncemets'])
View announcement
@endcomponent


@endcomponent