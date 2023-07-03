{{ $announcment }}

@if (strpos($announcment, 'new message') !== false)
    
<a href="http://localhost:4200/FCAIChat" class="button">Go to Chat</a>
@component('mail::button', ['url' => 'http://localhost:4200/FCAIChat'])
View Message
@endcomponent

@elseif (strpos($announcment, 'You have been assigned to a new course ') !== false)
    
<a href="http://localhost:4200/dr_ta_courses" class="button">View My Courses</a>
@component('mail::button', ['url' => 'http://localhost:4200/dr_ta_courses'])
View My Courses
@endcomponent
        
@else       
@component('mail::button', ['url' => 'http://localhost:4200/Announcements'])
View Announcement
@endcomponent


@endif
