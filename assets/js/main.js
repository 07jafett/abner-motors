const reveals = document.querySelectorAll(".reveal");

function revealOnScroll() {
  const trigger = window.innerHeight * 0.85;

  reveals.forEach((element) => {
    const top = element.getBoundingClientRect().top;

    if (top < trigger) {
      element.classList.add("active");
    }
  });
}

window.addEventListener("scroll", revealOnScroll);

revealOnScroll();
const nav = document.querySelector(".nav");

window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    nav.style.background = "rgba(5,7,13,.92)";
    nav.style.padding = "18px 70px";
    nav.style.boxShadow = "0 10px 30px rgba(0,0,0,.35)";
  } else {
    nav.style.background = "rgba(5,7,13,.45)";
    nav.style.padding = "25px 70px";
    nav.style.boxShadow = "none";
  }
});
const glow = document.querySelector(".glow");

document.addEventListener("mousemove", (e) => {
  glow.style.left = e.clientX + "px";
  glow.style.top = e.clientY + "px";
});
const cards = document.querySelectorAll(".car-card");

cards.forEach((card) => {
  card.addEventListener("mousemove", (e) => {
    const rect = card.getBoundingClientRect();

    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const rotateY = (x / rect.width - 0.5) * 18;
    const rotateX = (y / rect.height - 0.5) * -18;

    card.style.transform = `
        perspective(1000px)
        rotateX(${rotateX}deg)
        rotateY(${rotateY}deg)
        translateY(-10px)
        `;
  });

  card.addEventListener("mouseleave", () => {
    card.style.transform = `
        perspective(1000px)
        rotateX(0deg)
        rotateY(0deg)
        translateY(0px)
        `;
  });
});
const loader = document.getElementById("loader");

window.addEventListener("load", () => {
  setTimeout(() => {
    loader.classList.add("hide");
  }, 1800);
});
document.body.style.scrollBehavior = "smooth";
window.addEventListener("scroll", () => {
  const scroll = window.scrollY;

  const heroContent = document.querySelector(".hero-content");
  const video = document.querySelector(".bg-video");

  if (heroContent) {
    heroContent.style.transform = `translateY(${scroll * 0.25}px)`;
    heroContent.style.opacity = 1 - scroll / 600;
  }

  if (video) {
    video.style.transform = `scale(${1.08 + scroll * 0.00025})`;
  }
});
window.addEventListener("scroll", () => {
  const bg = document.querySelector(".showcase-bg");

  if (bg) {
    const scroll = window.scrollY;

    bg.style.transform = `
        translateX(${scroll * 0.15}px)
        `;
  }
});
window.addEventListener("scroll", () => {
  const image = document.querySelector(".fullscreen-image");

  if (image) {
    const scroll = window.scrollY;

    image.style.transform = `
        scale(${1.08 + scroll * 0.00015})
        `;
  }
});
const lenis = new Lenis({
  duration: 1.2,
  smoothWheel: true,
  smoothTouch: false,
});

function raf(time) {
  lenis.raf(time);

  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);
gsap.registerPlugin(ScrollTrigger);

gsap.from(".hero-content", {
  y: 120,
  opacity: 0,
  duration: 1.4,
  ease: "power4.out",
});

gsap.from(".car-card", {
  scrollTrigger: {
    trigger: ".cards",
    start: "top 80%",
  },

  y: 100,
  opacity: 0,
  duration: 1,
  stagger: 0.2,
  ease: "power3.out",
});

gsap.from(".showcase-content", {
  scrollTrigger: {
    trigger: ".showcase",
    start: "top 75%",
  },

  scale: 0.8,
  opacity: 0,
  duration: 1.2,
  ease: "power4.out",
});

gsap.from(".fullscreen-content", {
  scrollTrigger: {
    trigger: ".fullscreen-car",
    start: "top 70%",
  },

  y: 120,
  opacity: 0,
  duration: 1.2,
  ease: "power4.out",
});
const cursor = document.querySelector(".cursor");

document.addEventListener("mousemove", (e) => {
  cursor.style.left = e.clientX + "px";
  cursor.style.top = e.clientY + "px";
});

const hoverElements = document.querySelectorAll("a, button, .car-card");

hoverElements.forEach((element) => {
  element.addEventListener("mouseenter", () => {
    cursor.classList.add("active");
  });

  element.addEventListener("mouseleave", () => {
    cursor.classList.remove("active");
  });
});
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.addEventListener("click", () => {
  navLinks.classList.toggle("active");

  if (navLinks.classList.contains("active")) {
    menuToggle.innerHTML = "✕";
  } else {
    menuToggle.innerHTML = "☰";
  }
});
