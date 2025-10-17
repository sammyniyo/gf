<!-- Section Transitions & Animations -->
<style>
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Respect user's motion preferences */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }

        .fade-in-section,
        .fade-in-left,
        .fade-in-right,
        .scale-in {
            opacity: 1 !important;
            transform: none !important;
        }
    }

    /* Fade in on scroll animations */
    .fade-in-section {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 700ms cubic-bezier(.2,.65,.25,1), transform 700ms cubic-bezier(.2,.65,.25,1);
    }

    .fade-in-section.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: opacity 700ms cubic-bezier(.2,.65,.25,1), transform 700ms cubic-bezier(.2,.65,.25,1);
    }

    .fade-in-left.is-visible {
        opacity: 1;
        transform: translateX(0);
    }

    .fade-in-right {
        opacity: 0;
        transform: translateX(50px);
        transition: opacity 700ms cubic-bezier(.2,.65,.25,1), transform 700ms cubic-bezier(.2,.65,.25,1);
    }

    .fade-in-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }

    .scale-in {
        opacity: 0;
        transform: scale(0.9);
        transition: opacity 500ms cubic-bezier(.2,.65,.25,1), transform 500ms cubic-bezier(.2,.65,.25,1);
    }

    .scale-in.is-visible {
        opacity: 1;
        transform: scale(1);
    }

    /* Section Dividers */
    .section-divider {
        position: relative;
        height: 100px;
        overflow: hidden;
    }

    .section-divider svg {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Animated gradients */
    .animated-gradient {
        background: linear-gradient(-45deg, #059669, #10b981, #34d399, #6ee7b7);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Floating particles */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: currentColor;
        border-radius: 50%;
        opacity: 0.3;
        animation: float 20s infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
        10% { opacity: 0.3; }
        90% { opacity: 0.3; }
        100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
    }

    /* Parallax backgrounds */
    .parallax-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        transform: translateZ(-1px) scale(2);
        z-index: -1;
    }

    /* Stagger animation delays */
    .stagger-1 { transition-delay: 0.1s; }
    .stagger-2 { transition-delay: 0.2s; }
    .stagger-3 { transition-delay: 0.3s; }
    .stagger-4 { transition-delay: 0.4s; }
    .stagger-5 { transition-delay: 0.5s; }

    /* Pulse animation for CTAs */
    .pulse-glow {
        animation: pulseGlow 2s ease-in-out infinite;
    }

    @keyframes pulseGlow {
        0%, 100% {
            box-shadow: 0 0 20px rgba(5, 150, 105, 0.3);
        }
        50% {
            box-shadow: 0 0 40px rgba(5, 150, 105, 0.6), 0 0 60px rgba(5, 150, 105, 0.3);
        }
    }

    /* Wave animations */
    .wave-animation {
        animation: wave 10s linear infinite;
    }

    @keyframes wave {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    /* Section background patterns */
    .dot-pattern {
        background-image: radial-gradient(circle, rgba(5, 150, 105, 0.1) 1px, transparent 1px);
        background-size: 20px 20px;
    }

    .grid-pattern {
        background-image:
            linear-gradient(rgba(5, 150, 105, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(5, 150, 105, 0.05) 1px, transparent 1px);
        background-size: 40px 40px;
    }

    /* Glowing orbs */
    .glow-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.3;
        animation: orbFloat 20s ease-in-out infinite;
    }

    @keyframes orbFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(50px, -50px) scale(1.1); }
        66% { transform: translate(-50px, 50px) scale(0.9); }
    }
</style>

<script>
    // Intersection Observer for scroll animations
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.fade-in-section, .fade-in-left, .fade-in-right, .scale-in').forEach(el => {
            observer.observe(el);
        });

        // Create floating particles
        function createParticles(container) {
            const particlesContainer = container.querySelector('.particles');
            if (!particlesContainer) return;

            for (let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (15 + Math.random() * 10) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles for all particle containers
        document.querySelectorAll('.particles').forEach(createParticles);

        // Parallax scroll effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('[data-parallax]');

            parallaxElements.forEach(el => {
                const speed = el.dataset.parallax || 0.5;
                const yPos = -(scrolled * speed);
                el.style.transform = `translateY(${yPos}px)`;
            });
        });
    });
</script>

