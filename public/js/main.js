window.addEventListener("scroll", function () {
    const ScrollY = window.pageYOffset;
    const navContainer = document.querySelector("#navigation-container");
    const nav = document.querySelector("#navigation");
    const logo = document.querySelector("#logo");
    if (ScrollY > 5) {
        nav.classList.add("nav-scroll");
        navContainer.classList.add("container-scroll");
        logo.classList.add("logo-scroll");
    } else {
        nav.classList.remove("nav-scroll");
        navContainer.classList.remove("container-scroll");
        logo.classList.remove("logo-scroll");
    }
});

document.querySelectorAll(".accordion").forEach((accordion) => {
    const header = accordion.querySelector(".header");
    const icon = accordion.querySelector(".icon");
    const content = accordion.querySelector(".content");

    header.addEventListener("click", () => {
        const open = content.classList.contains("max-h-[300px]");

        if (open) {
            content.classList.remove("max-h-[300px]", "mt-3");
            content.classList.add("max-h-0");
            icon.classList.remove("rotate-45");
        } else {
            content.classList.add("max-h-[300px]", "mt-3");
            content.classList.remove("max-h-0");
            icon.classList.add("rotate-45");
        }
    });
});

const navigation = document.getElementById("navigation");
const hamburger = document.querySelector("#hamburger");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navigation.classList.toggle("nav-active");
});

navLinks.forEach((anchor) => {
    anchor.addEventListener("click", function () {
        navigation.classList.remove("nav-active");
        hamburger.classList.remove("hamburger-active");
    });
});


