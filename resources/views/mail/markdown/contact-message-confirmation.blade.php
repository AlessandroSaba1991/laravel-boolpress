@component('mail::message')
# Message Send

Message Received,
We will contact you asap.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
