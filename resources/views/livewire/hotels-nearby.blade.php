<div>
    <ul>
        @foreach ($hotels as $hotel)
            <li>{{ $hotel->name }} - {{ $hotel->distance }} km</li>
        @endforeach
    </ul>
</div>