@component('mail::message')
<p>
    {{ $user->name }} <br>
    Your task's status has been updated to Closed.
    <br>
    Task title : {{ $task->title }},
    <br>
    Task ID : {{ $task->id }}
</p>
@endcomponent
