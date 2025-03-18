document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");

    // counter reset
    const runCounter = (counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const speed = 200; // animation speed
            const count = +counter.innerText;

            // increment number
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10); // timeout speed
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    };

    // Intersection Observer
    const observerOptions = {
        threshold: 0.5, // Trigger in 50% element 
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                runCounter(counter); // run animation counter
                observer.unobserve(counter); // stop animation
            }
        });
    }, observerOptions);

    // Observer
    counters.forEach((counter) => {
        observer.observe(counter);
    });
});