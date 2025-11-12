@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "MusicGroup",
    "name": "God's Family Choir",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('android-icon-192x192.png') }}",
    "image": "{{ asset('images/hero.jpg') }}",
    "description": "God's Family Choir is a Seventh-day Adventist worship choir from Kigali, Rwanda, serving the words of life to the world through gospel messages.",
    "foundingDate": "1998",
    "foundingLocation": {
        "@type": "Place",
        "name": "Kigali, Rwanda"
    },
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "RW"
    },
    "sameAs": [
        "https://www.youtube.com/@godsfamilychoir5583",
        "https://www.facebook.com/godsfamilychoirrwanda",
        "https://www.instagram.com/godsfamilychoir"
    ],
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer support",
        "email": "asa.godsfamilychoir2017@gmail.com",
        "areaServed": "RW"
    }
}
</script>
@endpush

