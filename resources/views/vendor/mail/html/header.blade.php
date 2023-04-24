@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === "Boutique Département Informatique")
<img src="https://i.goopics.net/sin8t8.png" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
