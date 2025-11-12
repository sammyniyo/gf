@props([
    'headline',
    'description',
    'authorName',
    'datePublished',
    'dateModified' => null,
    'image' => null,
    'url' => null,
])

@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $headline }}",
    "description": "{{ $description }}",
    @if($image)
    "image": ["{{ $image }}"],
    @endif
    "author": {
        "@type": "Person",
        "name": "{{ $authorName }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "God's Family Choir",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('android-icon-192x192.png') }}"
        }
    },
    "datePublished": "{{ \Illuminate\Support\Carbon::parse($datePublished)->toIso8601String() }}"
    @if($dateModified)
    ,
    "dateModified": "{{ \Illuminate\Support\Carbon::parse($dateModified)->toIso8601String() }}"
    @endif
    @if($url)
    ,
    "url": "{{ $url }}"
    @endif
}
</script>
@endpush

