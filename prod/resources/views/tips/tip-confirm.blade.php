@component('mail::message')
##Thank you, {{ $name }}!
***
##We have received your TIP submission!
***
<br>
@component('mail::panel')
You can view your TIP submission by logging into the TIP app then selecting View Previous TIPs.
@endcomponent

{{ config('TIP') }}
@endcomponent
