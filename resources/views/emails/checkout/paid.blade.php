@component('mail::message')
# Your Transaction Has Been Confirmed

Your transaction has been confirmed, now you can enjoy the benefits of <b>{{ $checkout->Camp->title }}</b> class.

@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent