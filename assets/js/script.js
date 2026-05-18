(function () {
  function initScript() {
    var body = document.body;

    // NAVIGATION
    var burger = document.querySelector("[data-burger]");
    var mobileMenu = document.querySelector("[data-mobile-menu]");
    var hero = document.querySelector(".hero");
    var heroLogo = document.querySelector("[data-logo-start][data-logo-dark]");
    var mobileLinks = document.querySelectorAll("[data-mobile-menu] a");

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
          : heroLogo.getAttribute("data-logo-start");
      }
    }

    function openMenu() {
      body.classList.add("menu-open");

      if (burger) {
        burger.setAttribute("aria-expanded", "true");
      }
    }

    function closeMenu() {
      body.classList.remove("menu-open");

      if (burger) {
        burger.setAttribute("aria-expanded", "false");
      }
    }

    function toggleMenu() {
      if (body.classList.contains("menu-open")) {
        closeMenu();
      } else {
        openMenu();
      }
    }

    if (burger && mobileMenu) {
      burger.addEventListener("click", toggleMenu);

      mobileLinks.forEach(function (link) {
        link.addEventListener("click", closeMenu);
      });
    }

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") {
        closeMenu();

        var lightbox = document.getElementById("lightbox");
        var lightboxImg = lightbox ? lightbox.querySelector("img") : null;

        if (lightbox) {
          lightbox.classList.remove("active");
        }

        if (lightboxImg) {
          lightboxImg.src = "";
          lightboxImg.alt = "";
        }
      }
    });

    window.addEventListener("scroll", setScrolledState, { passive: true });
    window.addEventListener("resize", setScrolledState);

    setScrolledState();

    // LIGHTBOX FOR CASE IMAGES ONLY
    var lightbox = document.getElementById("lightbox");
    var lightboxImg = lightbox ? lightbox.querySelector("img") : null;
    var closeBtn = lightbox ? lightbox.querySelector(".lightbox-close") : null;
    var isCasePage =
      body.classList.contains("single-case") ||
      !!document.querySelector(".case-single");

    if (isCasePage && lightbox && lightboxImg) {
      function openLightbox(image) {
        if (!image) {
          return;
        }

        lightboxImg.src = image.currentSrc || image.src;
        lightboxImg.alt = image.alt || "";
        lightbox.classList.add("active");
      }

      function closeLightbox() {
        lightbox.classList.remove("active");
        lightboxImg.src = "";
        lightboxImg.alt = "";
      }

      document.addEventListener("click", function (event) {
        var clickedImage = event.target.closest("[data-case-lightbox]");

        if (!clickedImage) {
          return;
        }

        event.preventDefault();
        openLightbox(clickedImage);
      });

      document.querySelectorAll("[data-case-lightbox]").forEach(function (img) {
        img.style.cursor = "zoom-in";
      });

      if (closeBtn) {
        closeBtn.addEventListener("click", closeLightbox);
      }

      lightbox.addEventListener("click", function (event) {
        if (event.target === lightbox) {
          closeLightbox();
        }
      });
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initScript);
  } else {
    initScript();
  }
})();
