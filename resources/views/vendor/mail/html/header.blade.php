@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://res.cloudinary.com/dd9xaofdu/image/upload/v1737822937/cozyway_fyxi1a.png" class="h-full w-32" alt="CozyWay Logo" />
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
