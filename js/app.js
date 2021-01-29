const titlerev = gsap.timeline();
const footer= gsap.timeline();
const paragraph = gsap.timeline();
const image = gsap.timeline();

    titlerev.from("h1", {
        delay: 0.5,
        duration: 1,
        y: -150,
        ease: "power1.out",
        stagger: {
            amount: 0.2
        }
    });

    image.from('#right-pannel', {
        delay: 1.5,
        duration: 2,
        x: -2000,
        rotate: -15,
        ease: "power1.out",
        stagger: {
            amount: 0.6
        }
    });

    paragraph.from("#left-pannel", {
        delay: 1.5,
        duration: 2,
        x: -1500,
        rotate: -10,
        ease: "power5.out",
        stagger: {
            amount: 0.2
        }
    });

    footer.from(["footer"], {
        delay: 3.5,
        duration: 1,
        y: 300,
        ease: "power2.out",
        stagger: {
            amount: 0.2
        }
    });