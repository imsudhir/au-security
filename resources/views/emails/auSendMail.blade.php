{{-- @component('mail::message') --}}
@if ($details['brodcast']==1)
<h2>New jobs available</h2>
<b>Apply here: </b>{{$details['link']}}
{{-- @component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent --}}
<br>
<br>
Thanks,
<br>
<br>
{{ config('app.name') }}
@else
    
<h2>Your Login Creentials</h2>
<b>userid: </b>{{$details['userid']}}<br>
<b>password: </b>{{$details['password']}}
{{-- @component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent --}}
<br>
<br>
Thanks,
yoursecuritynsw.com.au
<br>
<br>
{{ config('app.name') }}
@endif

{{-- @endcomponent --}}
