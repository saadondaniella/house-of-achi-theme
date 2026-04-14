(function () {
  var body = document.body;
  var burger = document.querySelector("[data-burger]");
  var mobileMenu = document.querySelector("[data-mobile-menu]");
  var hero = document.querySelector(".hero");
  var heroLogo = document.querySelector("[data-logo-white][data-logo-dark]");
  var mobileLinks = document.querySelectorAll("[data-mobile-menu] a");

  if (!burger || !mobileMenu) {
    return;
  }

  function setScrolledState() {
    if (!hero) {
      return;
    }

    var heroBottom = hero.getBoundingClientRect().bottom;
    var isScrolled = heroBottom <= 80;

    if (isScrolled) {
      body.classList.add("is-scrolled");
    } else {
      body.classList.remove("is-scrolled");
    }

    if (heroLogo) {
      heroLogo.src = isScrolled
        ? heroLogo.getAttribute("data-logo-dark")
        : heroLogo.getAttribute("data-logo-white");
    }
  }

  function openMenu() {
    body.classList.add("menu-open");
    burger.setAttribute("aria-expanded", "true");
  }

  function closeMenu() {
    body.classList.remove("menu-open");
    burger.setAttribute("aria-expanded", "false");
  }

  function toggleMenu() {
    if (body.classList.contains("menu-open")) {
      closeMenu();
    } else {
      openMenu();
    }
  }

  burger.addEventListener("click", function () {
    toggleMenu();
  });

  mobileLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      closeMenu();
    });
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeMenu();
    }
  });

  window.addEventListener("scroll", setScrolledState, { passive: true });
  window.addEventListener("resize", setScrolledState);

  setScrolledState();
})();
