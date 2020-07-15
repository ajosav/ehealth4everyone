@component('mail::message')
# Introduction

The body of your message.

-something
-Another Thing

@component('mail::button', ['url' => ''])
Button Text
@endcomponent


@component('mail::panel', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
