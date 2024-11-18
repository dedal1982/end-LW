const navLink = document.querySelectorAll(".promo__header-list li a");

navLink.forEach((item) => {
  item.addEventListener("click", () => {
    navLink.forEach((elem) => {
      elem.classList.remove("active");
      item.classList.add("active");
    });
  });
});

const burgerClick = document.querySelector(".header__burger");
const burgerOpenMobile = document.querySelector(".header__mobile");
const scrollLock = document.querySelector(".body");
const promoMobileMenu = document.querySelector(".mobile-menu");

if (burgerClick) {
  burgerClick.addEventListener("click", () => {
    burgerClick.classList.toggle("active");
    promoMobileMenu.classList.toggle("active");
    scrollLock.classList.toggle("lock");
  });
}

const links = document.querySelectorAll(".services__item-bottom a");

links.forEach((link) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();
    const servicesItem = event.target.closest(".services__item");
    const topParagraph = servicesItem.querySelector(".services__item-top p");

    if (topParagraph) {
      topParagraph.classList.toggle("active");
      if (link.textContent === "Назад") {
        link.textContent = "Больше";
      } else {
        link.textContent = "Назад";
      }
    }
  });
});

const promoBtn = document.querySelector(".promo__header-top a");
const popupTop = document.querySelector(".popup-top");
const popupTopClose = document.querySelector(".popup-top__close");

if (promoBtn) {
  promoBtn.addEventListener("click", () => {
    popupTop.classList.add("active");
    scrollLock.classList.add("lock");
  });
}

if (popupTopClose) {
  popupTopClose.addEventListener("click", () => {
    popupTop.classList.remove("active");
    scrollLock.classList.remove("lock");
  });
}

const mobileMenuLinks = document.querySelectorAll(".mobile-menu-links li a");

if (mobileMenuLinks) {
  mobileMenuLinks.forEach((item) => {
    item.addEventListener("click", () => {
      promoMobileMenu.classList.remove("active");
      burgerClick.classList.remove("active");
      scrollLock.classList.remove("lock");
    });
  });
}
