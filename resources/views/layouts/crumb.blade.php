@if($page['crumb'])
	@foreach($page['crumb'] as $key => $value)
		@if($key === array_key_last($page['crumb']))
			<span class="text-muted fw-light">{{ $key }}</span>
        @else
			<span class="text-muted fw-light"><a href="{{ $value }}">{{ $key }}</a></span>
		@endif
	@endforeach
@endif
