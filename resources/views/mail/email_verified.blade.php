@component('mail::message')
# Welcome to Ehealth for everyone

You have successfully verified your email, you can now access your dashboard. click the link below to start
{{$link = config('app.url').'/dashboard'}}
@component('mail::button', ['url' => $link ])
continue
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
