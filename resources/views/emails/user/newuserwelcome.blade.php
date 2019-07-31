@component('mail::message')
# Welcome to Blog IT

Thanks for signing up. **We really appreciate it**. Let use _know if we can_ do more to please you!

@component('mail::button', ['url' => config('app.url') ])
Go to dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
