export default {
    mounted(el, binding) {
        const loadImage = () => {
            const img = el.querySelector('img');
            const spinner = el.querySelector('.spinner');
            const srcUrl = img.dataset.src;

            if (img && srcUrl) {
                img.addEventListener('load', () => {
                    if (spinner) spinner.style.display = 'none';
                    img.classList.add('fade-in');
                });

                img.addEventListener('error', () => {
                    console.error(`Failed to load image: ${srcUrl}`);
                    if (spinner) spinner.style.display = 'none';
                });

                img.src = srcUrl; // Set the image src
            }
        };
        const handleIntersect = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    loadImage();
                    observer.unobserve(el); // Stop observing once the image is loaded
                }
            });
        };


        const createObserver = () => {
            const options = {
                root: null, // Use viewport as root
                threshold: 0.1 // Trigger when 10% of the image is visible
            };

            const observer = new IntersectionObserver(handleIntersect, options);
            observer.observe(el); // Start observing the element
        };

        createObserver();
    }
}
