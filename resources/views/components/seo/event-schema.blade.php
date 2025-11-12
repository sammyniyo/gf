@props([
    'name',
    'startDate',
    'endDate' => null,
    'description' => null,
    'image' => null,
    'locationName' => null,
    'locationAddress' => null,
    'url' => null,
])

@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "{{ $name }}",
    @if($description)
    "description": "{{ $description }}",
    @endif
    "startDate": "{{ \Illuminate\Support\Carbon::parse($startDate)->toIso8601String() }}",
    @if($endDate)
    "endDate": "{{ \Illuminate\Support\Carbon::parse($endDate)->toIso8601String() }}",
    @endif
    @if($image)
    "image": "{{ $image }}",
    @endif
    @if($url)
    "url": "{{ $url }}",
    @endif
    @if($locationName || $locationAddress)
    "location": {
        "@type": "Place",
        "name": "{{ $locationName ?? 'Event Location' }}",
        @if($locationAddress)
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $locationAddress }}"
        }
        @endif
    }
    @endif
}
</script>
@endpush

