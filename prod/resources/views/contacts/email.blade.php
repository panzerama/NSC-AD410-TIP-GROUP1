@component('mail::message')
**From:** *{{ $email }}*
***
**Subject** *{{ $topic }}*
***
<br>
@component('mail::panel')
{{ $body }}
@endcomponent

{{ config('TIP') }}
@endcomponent
