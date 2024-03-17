@php
 $classes = "text-xs text-gray-600 hover:text-gray-900";
@endphp

<a class="{{$attributes->merge(['class' =>$classes])}}">
    {{ $slot }}
</a>
