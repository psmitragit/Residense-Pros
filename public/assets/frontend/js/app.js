// Active page

const currentPage = window.location.pathname.split("/").pop();
const navLinks = document.querySelectorAll(".navA");

navLinks.forEach(link => {
  if (link.getAttribute("href") === currentPage) {
    link.classList.add("active");
  }
});

// Logo height smaller

document.addEventListener("DOMContentLoaded", function () {
  const body = document.body;

  window.addEventListener("scroll", function () {
    if (window.scrollY > 50) {
      body.classList.add("shrink-logo");
    } else {
      body.classList.remove("shrink-logo");
    }
  });
});




// Dynamic padding top in body

document.addEventListener("DOMContentLoaded", function () {
  const possibleHeaders = [
    document.querySelector(".myHeader"),
    document.querySelector("#masthead2"),
    document.querySelector(".transition-header"),
    document.querySelector(".mobile-header")
  ];

  // Get the first visible header with a height > 0
  function getVisibleHeader() {
    return possibleHeaders.find(header => {
      if (!header) return false;
      const style = getComputedStyle(header);
      return style.display !== "none" && header.offsetHeight > 0;
    });
  }

  function updateBodyMargin() {
    const header = getVisibleHeader();
    if (header) {
      const headerHeight = header.offsetHeight;
      document.body.style.paddingTop = headerHeight + "px";
    }
  }

  // Initial adjustment
  updateBodyMargin();

  // Also update after slight delay to catch late layout
  setTimeout(updateBodyMargin, 100);

  // Recalculate on resize
  window.addEventListener("resize", updateBodyMargin);
});



// Weavy text
gsap.registerPlugin(ScrollTrigger);

$(document).ready(function () {
  $(".weavy-text").each(function () {
    let $el = $(this);
    let html = $el.html();

    // Replace <br> with placeholder
    html = html.replace(/<br\s*\/?>/gi, '__BR__');
    let text = $('<div>').html(html).text();
    let lines = text.split('__BR__');

    let wrappedHtml = lines.map(line => {
      let words = line.trim().split(/\s+/);

      let wrappedWords = words.map(word => {
        let letters = word.split('').map(letter => {
          return `<span class="letter">${letter}</span>`;
        }).join('');
        return `<span class="word">${letters}</span>`;
      }).join(' ');

      return wrappedWords;
    }).join('<br/>');

    $el.html(wrappedHtml);

    // Animate each letter individually
    gsap.from($el.find(".letter"), {
      scrollTrigger: {
        trigger: $el[0],
        start: "top 85%",
        toggleActions: "play none none none",
        once: true
      },
      y: 40,
      opacity: 0,
      ease: "power3.out",
      duration: 0.8,
      stagger: {
        each: 0.05,
        from: "start"
      }
    });
  });

  $(".weavy-word-text").each(function () {
    let $el = $(this);
    let html = $el.html();

    // Replace <br> with placeholder
    html = html.replace(/<br\s*\/?>/gi, '__BR__');
    let text = $('<div>').html(html).text();
    let lines = text.split('__BR__');

    let wrappedHtml = lines.map(line => {
      let words = line.trim().split(/\s+/);
      let wrappedWords = words.map(word =>
        `<span class="word"><span class="word-inner">${word}</span></span>`
      ).join(' ');
      return wrappedWords;
    }).join('<br/>');

    $el.html(wrappedHtml);

    // Animate
    gsap.from($el.find(".word"), {
      scrollTrigger: {
        trigger: $el[0],
        start: "top 85%",
        toggleActions: "play none none none",
        once: true
      },
      y: 40,
      opacity: 0,
      ease: "power3.out",
      duration: 0.8,
      stagger: {
        each: 0.08,
        from: "start"
      }
    });
  });
});



// Heart icon onlick
document.addEventListener('DOMContentLoaded', function () {
  // Property Fav Logic
  document.querySelectorAll('.property-fav').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const icon = this.querySelector('i');
      toggleHeart(icon);
    });
  });

  // Like Btn Logic
  document.querySelectorAll('.like_btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const icon = this.querySelector('i');
      toggleHeart(icon);
    });
  });

  // Shared Toggle + Animation Logic
  function toggleHeart(icon) {
    icon.classList.toggle('fa-regular');
    icon.classList.toggle('fa-solid');

    icon.classList.add('heart-animate');

    setTimeout(() => {
      icon.classList.remove('heart-animate');
    }, 600);
  }
});


// all property image should same height

document.addEventListener("DOMContentLoaded", function () {
  const images = document.querySelectorAll(".card-img");
  let minHeight = Infinity;

  let loadedImages = 0;
  images.forEach((img) => {
    img.onload = () => {
      loadedImages++;
      minHeight = Math.min(minHeight, img.offsetHeight);

      if (loadedImages === images.length) {
        images.forEach((img) => {
          img.style.height = minHeight + "px";
          img.style.objectFit = "cover";
        });
      }
    };
  });
});

// Scroll to top button

document.addEventListener("DOMContentLoaded", function () {
  let btn = document.getElementById("scrollToTopBtn");
  if (window.scrollY > 100) {
    btn.style.display = "flex";
  } else {
    btn.style.display = "none";
  }

  window.addEventListener("scroll", function () {
    if (window.scrollY > 100) {
      btn.style.display = "flex";
    } else {
      btn.style.display = "none";
    }
  });

  btn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
});


// Property increment & decrement button

function increment(id) {
  const el = document.getElementById(id);
  let val = parseInt(el.innerText) + 1;
  el.innerText = val;
  $('input[name="' + id + '"]').val(val);
}

function decrement(id) {
  const el = document.getElementById(id);
  const current = parseInt(el.innerText);
  if (current > 0) {
    let val = current - 1;
    el.innerText = val;
    $('input[name="' + id + '"]').val(val);
  };
}


// Upload image 
document.addEventListener('DOMContentLoaded', function () {
  const floorUploadBox = document.getElementById('floorUploadBox');
  const floorInput = document.getElementById('floorInput');

  if (floorUploadBox && floorInput) {
    floorUploadBox.addEventListener('click', function () {
      floorInput.click();
    });
  }

  const photoUploadBox = document.getElementById('photoUploadBox');
  const photoInput = document.getElementById('photoInput');

  if (photoUploadBox && photoInput) {
    photoUploadBox.addEventListener('click', function () {
      photoInput.click();
    });
  }
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


// Toggle list or map view

document.addEventListener("DOMContentLoaded", function () {
  const listBtn = document.getElementById("listBtn");
  const mapBtn = document.getElementById("mapBtn");
  const highlight = document.querySelector(".toggle-highlight");

  // Set initial highlight position
  if (mapBtn) {
    if (mapBtn.classList.contains("active")) {
      highlight.style.transform = "translateX(100%)";
    } else {
      highlight.style.transform = "translateX(0)";
    }
  }

  function activateToggle(activeBtn, inactiveBtn, moveRight, redirectURL) {

    if (activeBtn.classList.contains("active") || window.location.pathname.includes(redirectURL)) {
      return;
    }

    inactiveBtn.classList.remove("active");
    activeBtn.classList.add("active");
    highlight.style.transform = moveRight ? "translateX(100%)" : "translateX(0)";

    setTimeout(() => {
      window.location.href = redirectURL;
    }, 500);
  }

  if (listBtn) {
    listBtn.addEventListener("click", () => {
      activateToggle(listBtn, mapBtn, false, "properties-list.html");
    });
  }

  if (mapBtn && listBtn) {
    mapBtn.addEventListener("click", () => {
      activateToggle(mapBtn, listBtn, true, "properties-map.html");
    });
  }
});


// Prop details gallery

$(document).ready(function () {
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });

  $('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    asNavFor: '.slider-for',
    centerMode: true,
    centerPadding: '0px',
    focusOnSelect: true,
    arrows: true,
    dots: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 768,
        settings: { slidesToShow: 3 }
      },
      {
        breakpoint: 576,
        settings: { slidesToShow: 2 }
      }
    ]
  });
});

// Tab switching fade effect

const tabTriggers = document.querySelectorAll('[data-bs-toggle="tab"]');
tabTriggers.forEach(tab => {
  tab.addEventListener('shown.bs.tab', function (event) {
    const targetPane = document.querySelector(event.target.dataset.bsTarget);
    targetPane.classList.add('show');
  });
});
