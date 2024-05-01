document.addEventListener("DOMContentLoaded", function () {
    let carousel = document.querySelector(".carousel");
    let items = carousel.querySelectorAll(".item");
    let dotsContainer = document.querySelector(".dots");
  
    // Insert dots into the DOM
    items.forEach((_, index) => {
      let dot = document.createElement("span");
      dot.classList.add("dot");
      if (index === 0) dot.classList.add("active");
      dot.dataset.index = index;
      dotsContainer.appendChild(dot);
    });
  
    let dots = document.querySelectorAll(".dot");
  
    // Function to show a specific item
    function showItem(index) {
      items.forEach((item, idx) => {
        item.classList.remove("active");
        dots[idx].classList.remove("active");
        if (idx === index) {
          item.classList.add("active");
          dots[idx].classList.add("active");
        }
      });
    }
  
    // Event listeners for buttons
    document.querySelector(".prev").addEventListener("click", () => {
      let index = [...items].findIndex((item) =>
        item.classList.contains("active")
      );
      showItem((index - 1 + items.length) % items.length);
    });
  
    document.querySelector(".next").addEventListener("click", () => {
      let index = [...items].findIndex((item) =>
        item.classList.contains("active")
      );
      showItem((index + 1) % items.length);
    });
  
    // Event listeners for dots
    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        let index = parseInt(dot.dataset.index);
        showItem(index);
      });
    });
  });

  // Hero
  document.addEventListener("DOMContentLoaded", function () {
    let video = document.getElementById("video-homepage");
  
    video.addEventListener("loadeddata", function() {
        video.style.display = "block";
        video.play(); 
 
        setTimeout(function() {
            document.querySelector(".hero_content h1").classList.add("show");
            document.querySelector(".hero_content button").classList.add("show");
        }, 500); 
    });

    
    video.addEventListener("ended", function() {
        video.play();
    });
});

// categorie

document.addEventListener("DOMContentLoaded", function () {
  const icons = document.querySelectorAll(".category-icon img");

  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function showIcons() {
    icons.forEach((icon) => {
      if (isInViewport(icon)) {
        icon.classList.add("show");
      } else {
        icon.classList.remove("show");
      }
    });
  }

  showIcons();

  window.addEventListener("scroll", showIcons);
});





  


  
  