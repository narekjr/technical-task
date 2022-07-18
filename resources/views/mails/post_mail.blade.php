@component('mail::message')
    # New Post on {{ $websiteName }}

    {{ $content }}

    Thanks
    {{ config('app.name') }}
@endcomponent
