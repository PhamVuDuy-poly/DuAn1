document.addEventListener("DOMContentLoaded", () => {
    const progressBars = document.querySelectorAll(".progress-bar");

    const animateProgressBar = (progressBar) => {
        const targetWidth = progressBar.getAttribute("data-target");
        const target = parseInt(targetWidth.replace('%', ''), 10);
        const duration = 100; // animation duration in millisecond
        const incrementTime = 10; // Interval in millisecond
        const increment = target / (duration / incrementTime); // increment 

        let currentWidth = 0; // start from 0%

        const updateWidth = () => {
            if (currentWidth < target) {
                currentWidth += increment;
                progressBar.style.width = `${Math.ceil(currentWidth)}%`;
                progressBar.innerText = `${Math.ceil(currentWidth)}%`; // show percentage
                setTimeout(updateWidth, incrementTime); // speed control
            } else {
                progressBar.style.width = targetWidth;
                progressBar.innerText = targetWidth; // target number
            }
        };

        updateWidth();
    };

    //  Intersection Observer
    const observerOptions = {
        threshold: 0.5, // Trigger 50% to start
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const progressBar = entry.target;
                animateProgressBar(progressBar); // run animation
                observer.unobserve(progressBar); // stop it
            }
        });
    }, observerOptions);

    // Observation
    progressBars.forEach((progressBar) => {
        observer.observe(progressBar);
    });
});