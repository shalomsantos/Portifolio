if (typeof Splide !== 'undefined') {
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        gap: '1rem',
        breakpoints: {
            992: { perPage: 3 },
            768: { perPage: 2 },
            576: { perPage: 1 }
        }
    });

    splide.mount();
} else {
    console.error("Splide não está definido. Verifique o caminho da biblioteca.");
}