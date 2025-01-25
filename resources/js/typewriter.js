window.TypeWriter = class TypeWriter {
    constructor(selector, phrases, options = {}) {
        // Allow selecting by element, selector string, or direct element
        this.element = typeof selector === 'string' 
            ? document.querySelector(selector) 
            : selector;
        
        if (!this.element) {
            console.error('No element found for typing effect');
            return;
        }

        // Default options with ability to override
        this.options = {
            phrases: phrases,
            speed: 100,       // typing speed
            delay: 2000,      // delay between phrases
            pauseOnLast: true, // whether to pause on the last phrase
            loop: true,       // whether to continuously loop
            cursor: true,     // whether to show a blinking cursor
            cursorChar: '|',  // character used for cursor
            ...options
        };

        this.phraseIndex = 0;
        this.text = '';
        this.isDeleting = false;

        // Add cursor class if cursor is enabled
        if (this.options.cursor) {
            this.element.classList.add('type-cursor');
        }

        // Start typing
        this.type();
    }

    type() {
        const currentPhraseIndex = this.phraseIndex % this.options.phrases.length;
        const currentPhrase = this.options.phrases[currentPhraseIndex];

        if (this.isDeleting) {
            this.text = currentPhrase.substring(0, this.text.length - 1);
        } else {
            this.text = currentPhrase.substring(0, this.text.length + 1);
        }

        this.element.textContent = this.text;

        let typeSpeed = this.options.speed;

        if (this.isDeleting) {
            typeSpeed /= 2;
        }

        // Determine next state
        if (!this.isDeleting && this.text === currentPhrase) {
            // Phrase is fully typed
            typeSpeed = this.options.delay;
            this.isDeleting = true;

            // Check if it's the last phrase and we don't want to loop
            if (!this.options.loop && 
                currentPhraseIndex === this.options.phrases.length - 1) {
                if (this.options.pauseOnLast) {
                    return; // Stop typing
                }
            }
        } else if (this.isDeleting && this.text === '') {
            // Phrase is fully deleted
            this.isDeleting = false;
            this.phraseIndex++;

            // Reset if not looping and we've gone through all phrases
            if (!this.options.loop && 
                this.phraseIndex >= this.options.phrases.length) {
                this.phraseIndex = 0;
            }

            typeSpeed = this.options.speed;
        }

        // Continue typing
        setTimeout(() => this.type(), typeSpeed);
    }
}