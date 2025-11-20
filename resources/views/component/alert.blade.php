{{--  --}}
@props(['type' => 'warning'])
<div class="alert alert-{{ $type }}" role="alert">
 {{ $slot }}
</div>
