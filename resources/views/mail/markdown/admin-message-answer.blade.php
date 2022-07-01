@component('mail::message')
# Admin Answer
L'Admin dice: <br>
{{$message->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
