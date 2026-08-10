import Alpine from "alpinejs";

window.Alpine = Alpine;

/* Carousel */

window.heroSlider = function () {
    return {
        current: 0,

        slides: [
            {
                image: "/images/hero/images.jpg",
                title: "HALAL CMS",
                subtitle: "Modern Content Management System berbasis Laravel.",
            },
            {
                image: "/images/hero/pexels-jwmedia-997670.jpg",
                title: "Kelola Berita",
                subtitle: "Publikasikan informasi dengan cepat dan mudah.",
            },
            {
                image: "/images/hero/mangga.jpg",
                title: "Portal Informasi",
                subtitle: "Berita, Galeri dan Pengumuman dalam satu aplikasi.",
            },
        ],

        next() {
            this.current = (this.current + 1) % this.slides.length;
        },

        prev() {
            this.current =
                (this.current - 1 + this.slides.length) % this.slides.length;
        },

        start() {
            setInterval(() => {
                this.next();
            }, 5000);
        },
    };
};

Alpine.start();
