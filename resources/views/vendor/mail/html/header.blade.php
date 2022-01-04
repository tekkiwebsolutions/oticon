<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Oticon')
<img src="{{asset('images/logo.svg')}}" class="logo" alt="Oticon">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
