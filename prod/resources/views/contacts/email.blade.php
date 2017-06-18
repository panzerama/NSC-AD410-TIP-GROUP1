@component('mail::message')
**From:** *{{ $name }}* ({{ $email }})
***
**Subject** *{{ $topic }}*
***
<br>
@component('mail::panel')
{{ $body }}
@endcomponent

{{ config('TIP') }}
@endcomponent
