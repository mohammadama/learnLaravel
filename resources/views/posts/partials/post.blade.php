{{-- @break($key == 2)  out key and stop loop --}} 
{{-- @continue($key == 1)  out key and continue loop --}}
@if ($loop->even)
<dir>{{ $key }} . {{ $post['title'] }}</dir>
@else
<dir style="background-color: rebeccapurple">{{ $key }} . {{ $post['title'] }}</dir>
@endif