@props([
'bgWhite' => '',
])

<div {{ $attributes->merge(['class' => $bgWhite . ':bg-white bg-gray-300 border border-gray-800']) }}
    draggable="true"
     x-init="
{{--     $watch('pieces', (value) => {--}}
{{--        if(value.hasOwnProperty($el.getAttribute('x-ref'))) {--}}
{{--            changePiece($el, value[$el.getAttribute('x-ref')])--}}
{{--        }--}}
{{--    });--}}
"
></div>
