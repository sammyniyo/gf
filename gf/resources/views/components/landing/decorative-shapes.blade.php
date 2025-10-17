<!-- Decorative Shapes and Graphics -->
<style>
    /* Geometric shapes that float */
    .floating-shape {
        position: absolute;
        opacity: 0.1;
        animation: floatShape 20s ease-in-out infinite;
    }

    @keyframes floatShape {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(30px, -30px) rotate(90deg); }
        50% { transform: translate(-20px, 20px) rotate(180deg); }
        75% { transform: translate(20px, 30px) rotate(270deg); }
    }

    /* Musical notes animation */
    .musical-note {
        position: absolute;
        font-size: 24px;
        opacity: 0;
        animation: floatNote 15s ease-in-out infinite;
    }

    @keyframes floatNote {
        0% { transform: translateY(0) rotate(0deg); opacity: 0; }
        10% { opacity: 0.3; }
        90% { opacity: 0.3; }
        100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
    }

    /* Gradient blob */
    .blob {
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: blobMorph 10s ease-in-out infinite;
    }

    @keyframes blobMorph {
        0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; transform: rotate(0deg); }
        25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; transform: rotate(90deg); }
        50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; transform: rotate(180deg); }
        75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; transform: rotate(270deg); }
    }

    /* Sparkle effect */
    .sparkle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: white;
        border-radius: 50%;
        animation: sparkle 3s ease-in-out infinite;
    }

    @keyframes sparkle {
        0%, 100% { opacity: 0; transform: scale(0); }
        50% { opacity: 1; transform: scale(1); }
    }

    /* Gradient line divider */
    .gradient-line {
        height: 3px;
        background: linear-gradient(90deg,
            transparent 0%,
            #10b981 20%,
            #fbbf24 50%,
            #10b981 80%,
            transparent 100%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Hexagon pattern */
    .hexagon-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l25.98 15v30L30 60 4.02 45V15z' fill='%2310b981' fill-opacity='0.05'/%3E%3C/svg%3E");
    }

    /* Circle pattern */
    .circle-pattern {
        background-image: radial-gradient(circle at center, rgba(16, 185, 129, 0.1) 1px, transparent 1px);
        background-size: 30px 30px;
    }
</style>

<!-- Decorative Elements Container -->
<div class="decorative-container">
    <!-- Musical Notes (can be placed in sections) -->
    <div class="musical-notes-container">
        <!-- These will be dynamically created by JavaScript -->
    </div>
</div>

<script>
    // Add musical notes animation to specific sections
    document.addEventListener('DOMContentLoaded', function() {
        const notesSymbols = ['🎵', '🎶', '🎼', '🎤', '🎧'];

        // Create floating musical notes
        function addMusicalNotes(container, count = 5) {
            for (let i = 0; i < count; i++) {
                const note = document.createElement('div');
                note.className = 'musical-note';
                note.textContent = notesSymbols[Math.floor(Math.random() * notesSymbols.length)];
                note.style.left = Math.random() * 100 + '%';
                note.style.animationDelay = Math.random() * 15 + 's';
                note.style.fontSize = (16 + Math.random() * 16) + 'px';
                container.appendChild(note);
            }
        }

        // Add notes to particles containers
        document.querySelectorAll('.particles').forEach(container => {
            addMusicalNotes(container, 8);
        });
    });
</script>

