let currentImageIndex = 0;
let galleryItems, overlay, expandedImage, imageCaption, prevButton, nextButton;

function initGallery() {
    galleryItems = Array.from(document.querySelectorAll(".gallery-item"));
    overlay = document.getElementById("imageOverlay");
    expandedImage = document.getElementById("expandedImage");
    imageCaption = document.getElementById("imageCaption");
    prevButton = document.getElementById("prevButton");
    nextButton = document.getElementById("nextButton");

    // Attach click listeners
    galleryItems.forEach((el, idx) => {
        el.addEventListener("click", (e) => {
            e.stopPropagation();
            openImageAt(idx % 6);
        });
    });

    document.addEventListener("keydown", function (e) {
        if (!overlay || overlay.classList.contains("hidden")) return;
        if (e.key === "ArrowLeft") navigateGallery(-1);
        else if (e.key === "ArrowRight") navigateGallery(1);
        else if (e.key === "Escape") closeExpandedImage();
    });
}

function openImageAt(index) {
    currentImageIndex = index;
    const el = galleryItems[currentImageIndex];
    if (!el) return;
    const img = el.querySelector("img");
    const caption = el.getAttribute("data-caption") || "";
    expandedImage.src = img.src;
    imageCaption.textContent = caption;

    overlay.classList.remove("hidden");
    overlay.classList.add("is-open");
    requestAnimationFrame(() => {
        expandedImage.classList.add("visible");
        imageCaption.classList.add("visible");
        prevButton.classList.remove("hidden");
        nextButton.classList.remove("hidden");
    });
}

function closeExpandedImage() {
    expandedImage.classList.remove("visible");
    imageCaption.classList.remove("visible");
    prevButton.classList.add("hidden");
    nextButton.classList.add("hidden");
    setTimeout(() => {
        overlay.classList.remove("is-open");
        overlay.classList.add("hidden");
    }, 300);
}

function navigateGallery(direction) {
    currentImageIndex = (currentImageIndex + direction + 6) % 6;
    expandedImage.classList.remove("visible");
    imageCaption.classList.remove("visible");
    setTimeout(() => openImageAt(currentImageIndex), 150);
}

// Expose for inline handlers if needed
window.navigateGallery = navigateGallery;
window.closeExpandedImage = closeExpandedImage;

document.addEventListener("DOMContentLoaded", initGallery);
