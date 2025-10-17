@extends('layouts.app')

@section('title', 'Terms of Use | God\'s Family Choir')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Terms of Use
            </h1>
            <p class="text-lg text-gray-600">
                Last updated: {{ date('F d, Y') }}
            </p>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 prose prose-lg max-w-none">

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Agreement to Terms</h2>
                <p class="text-gray-700 leading-relaxed">
                    Welcome to God's Family Choir. By accessing and using our website, services, and participating in our choir activities, you agree to be bound by these Terms of Use. If you do not agree to these terms, please do not use our services or participate in our activities.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">About God's Family Choir</h2>
                <p class="text-gray-700 leading-relaxed">
                    God's Family Choir is a faith-based musical ministry operating under ASA UR Nyarugenge SDA in Kigali, Rwanda. Our mission is to worship God through music, share His love with our community, and provide a space for spiritual growth and fellowship. We have been serving since 1998.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Membership and Registration</h2>

                <h3 class="text-xl font-semibold text-gray-800 mb-3">Eligibility</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    To become a member of God's Family Choir, you must:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
                    <li>Be at least 13 years of age (minors require parental consent)</li>
                    <li>Complete the membership registration form accurately and truthfully</li>
                    <li>Attend an orientation and audition (if required)</li>
                    <li>Agree to our code of conduct and choir expectations</li>
                    <li>Have a heart for worship and service</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mb-3">Application Process</h3>
                <p class="text-gray-700 leading-relaxed">
                    Membership applications are reviewed by our leadership team. We reserve the right to accept or decline applications at our discretion. Acceptance is based on voice quality, commitment, availability, and alignment with our mission and values.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Member Responsibilities</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    As a member of God's Family Choir, you agree to:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Attend regular rehearsals and be punctual</li>
                    <li>Participate in scheduled performances and events</li>
                    <li>Maintain a respectful and Christ-like attitude</li>
                    <li>Respect the leadership and fellow members</li>
                    <li>Wear appropriate choir attire during performances</li>
                    <li>Practice assigned music and parts outside of rehearsals</li>
                    <li>Notify leadership of absences in advance</li>
                    <li>Contribute to the choir community through service and support</li>
                    <li>Uphold the mission and values of God's Family Choir</li>
                    <li>Maintain confidentiality of sensitive choir matters</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Code of Conduct</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    All members and visitors are expected to:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Demonstrate Christ-like behavior and integrity</li>
                    <li>Refrain from discriminatory, harassing, or abusive behavior</li>
                    <li>Avoid the use of profanity or inappropriate language</li>
                    <li>Respect church property and equipment</li>
                    <li>Maintain a drug-free and alcohol-free environment during choir activities</li>
                    <li>Dress modestly and appropriately</li>
                    <li>Report any concerns or conflicts to leadership promptly</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Violation of our code of conduct may result in disciplinary action, including suspension or termination of membership.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Events and Performances</h2>

                <h3 class="text-xl font-semibold text-gray-800 mb-3">Event Registration</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    When registering for our events:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
                    <li>Provide accurate contact information</li>
                    <li>Tickets are non-transferable unless explicitly stated</li>
                    <li>We reserve the right to refuse admission</li>
                    <li>Event details (date, time, venue) may change with notice</li>
                    <li>No refunds for event registrations unless event is cancelled</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mb-3">Photography and Recording</h3>
                <p class="text-gray-700 leading-relaxed">
                    By attending our events or becoming a member, you consent to being photographed, videoed, or recorded during performances and activities. This content may be used for promotional purposes on our website, social media, and other marketing materials. If you have concerns, please notify us in writing.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Contributions and Donations</h2>
                <p class="text-gray-700 leading-relaxed">
                    Contributions and donations to God's Family Choir are voluntary and non-refundable. They are used to support choir operations, performances, equipment, and ministry activities. We are grateful for your support in advancing our mission.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Intellectual Property</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    All content on our website, including text, graphics, logos, music, videos, and software, is the property of God's Family Choir or its licensors and is protected by copyright and intellectual property laws.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    You may not:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Reproduce, distribute, or modify our content without permission</li>
                    <li>Use our name, logo, or branding without authorization</li>
                    <li>Record or distribute our performances without consent</li>
                    <li>Use our content for commercial purposes without a license</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Website Use</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    When using our website, you agree to:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Not attempt to gain unauthorized access to our systems</li>
                    <li>Not introduce viruses, malware, or harmful code</li>
                    <li>Not engage in activities that disrupt website functionality</li>
                    <li>Not collect or harvest user information without consent</li>
                    <li>Comply with all applicable laws and regulations</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Privacy and Data Protection</h2>
                <p class="text-gray-700 leading-relaxed">
                    Your privacy is important to us. Please review our <a href="{{ route('privacy-policy') }}" class="text-emerald-600 hover:text-emerald-700 underline">Privacy Policy</a> to understand how we collect, use, and protect your personal information.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Disclaimer of Warranties</h2>
                <p class="text-gray-700 leading-relaxed">
                    Our website and services are provided "as is" and "as available" without warranties of any kind, either express or implied. We do not guarantee that our website will be uninterrupted, error-free, or free from harmful components. Use of our services is at your own risk.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Limitation of Liability</h2>
                <p class="text-gray-700 leading-relaxed">
                    To the fullest extent permitted by law, God's Family Choir, its members, leaders, and affiliates shall not be liable for any direct, indirect, incidental, special, or consequential damages arising from your use of our services, website, or participation in choir activities. This includes but is not limited to personal injury, property damage, or loss of data.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Indemnification</h2>
                <p class="text-gray-700 leading-relaxed">
                    You agree to indemnify and hold harmless God's Family Choir, its leaders, members, and affiliates from any claims, damages, losses, or expenses (including legal fees) arising from your violation of these Terms of Use or your participation in choir activities.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Termination</h2>
                <p class="text-gray-700 leading-relaxed">
                    We reserve the right to suspend or terminate your membership or access to our services at any time, with or without notice, for violation of these Terms of Use, code of conduct, or any other reason deemed appropriate by our leadership.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Members may also voluntarily resign from the choir by providing written notice to the leadership.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Dispute Resolution</h2>
                <p class="text-gray-700 leading-relaxed">
                    Any disputes arising from these Terms of Use or your relationship with God's Family Choir should first be addressed through informal discussion with our leadership. If resolution cannot be reached, disputes will be handled in accordance with the laws of Rwanda.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Changes to Terms</h2>
                <p class="text-gray-700 leading-relaxed">
                    We may update these Terms of Use from time to time to reflect changes in our practices, services, or legal requirements. We will notify members of significant changes via email or website announcement. Continued use of our services after changes constitutes acceptance of the updated terms.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Severability</h2>
                <p class="text-gray-700 leading-relaxed">
                    If any provision of these Terms of Use is found to be invalid or unenforceable, the remaining provisions will continue in full force and effect.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Governing Law</h2>
                <p class="text-gray-700 leading-relaxed">
                    These Terms of Use are governed by and construed in accordance with the laws of Rwanda. Any legal proceedings shall be conducted in the appropriate courts of Rwanda.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Contact Information</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    If you have questions, concerns, or feedback regarding these Terms of Use, please contact us:
                </p>
                <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-6">
                    <p class="text-gray-800 font-semibold mb-2">God's Family Choir</p>
                    <p class="text-gray-700">ASA UR Nyarugenge SDA</p>
                    <p class="text-gray-700">Kigali, Rwanda</p>
                    <p class="text-gray-700 mt-3">
                        <strong>Email:</strong>
                        <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="text-emerald-600 hover:text-emerald-700">
                            asa.godsfamilychoir2017@gmail.com
                        </a>
                    </p>
                    <p class="text-gray-700">
                        <strong>Phone:</strong>
                        <a href="tel:+250783871782" class="text-emerald-600 hover:text-emerald-700">
                            +250 783 871 782
                        </a>
                    </p>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Acceptance of Terms</h2>
                <p class="text-gray-700 leading-relaxed">
                    By using our website, services, or participating in God's Family Choir activities, you acknowledge that you have read, understood, and agree to be bound by these Terms of Use. If you do not agree, please discontinue use of our services.
                </p>
                <div class="mt-6 bg-amber-50 border border-amber-200 rounded-lg p-6">
                    <p class="text-amber-900 font-semibold mb-2">🙏 Our Commitment</p>
                    <p class="text-amber-800 text-sm">
                        God's Family Choir is committed to maintaining a safe, welcoming, and Christ-centered environment for all members and visitors. We seek to honor God in all we do and to serve our community with love and excellence.
                    </p>
                </div>
            </section>

        </div>

        <!-- Back to Home Button -->
        <div class="text-center mt-12">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-semibold rounded-xl hover:shadow-lg hover:shadow-emerald-500/50 transition-all transform hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</div>

<x-static.footer />
@endsection

