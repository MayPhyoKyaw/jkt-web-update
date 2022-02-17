$(".carousel").carousel({
    pause: "false",
    interval: 8000,
});

function initImagePopup(elem) {
    // check for mouse click, add event listener on document
    document.addEventListener("click", function (e) {
      // check if click target is img of the elem - elem is image container
      if (!e.target.matches(elem + " img")) return;
      else {
        var image = e.target; // get current clicked image
        console.log(image)
        // create new popup image with all attributes for clicked images and offsets of the clicked image
        var popupImage = document.createElement("img");
        popupImage.setAttribute("src", image.src);
        popupImage.style.width = image.width + "px";
        popupImage.style.height = image.height + "px";
        popupImage.style.left = image.offsetLeft + "px";
        popupImage.style.top = image.offsetTop + "px";
        popupImage.classList.add("popImage");

        // creating popup image container
        var popupContainer = document.createElement("div");
        popupContainer.classList.add("popupContainer");

        // creating popup image background
        var popUpBackground = document.createElement("div");
        popUpBackground.classList.add("popUpBackground");

        // append all created elements to the popupContainer then on the document.body
        popupContainer.appendChild(popUpBackground);
        popupContainer.appendChild(popupImage);
        document.body.appendChild(popupContainer);

        // call function popup image to create new dimensions for popup image and make the effect
        popupImageFunction();

        // resize function, so that popup image have responsive ability
        var wait;
        window.onresize = function () {
          clearTimeout(wait);
          wait = setTimeout(popupImageFunction, 100);
        };

        // close popup image clicking on it
        popupImage.addEventListener("click", function (e) {
          closePopUpImage();
        });
        // close popup image on clicking on the background
        popUpBackground.addEventListener("click", function (e) {
          closePopUpImage();
        });

        function popupImageFunction() {
          // wait few miliseconds (10) and change style of the popup image and make it popup
          // waiting is for animation to work, yulu can disable it and check what is happening when it's not there
          setTimeout(function () {
            // I created this part very simple, but you can do it much better by calculating height and width of the screen,
            // image dimensions.. so that popup image can be placed much better
            popUpBackground.classList.add("active");
            popupImage.style.left = "20%";
            popupImage.style.top = "6.5%";
            popupImage.style.width = window.innerWidth * 0.6 + "px";
            if(window.innerWidth >= 2000) {
              popupImage.style.height = 900 + "px";
            } else if(window.innerWidth >= 1700) {
              popupImage.style.height = 800 + "px";
            } else if(window.innerWidth >= 1500) {
              popupImage.style.height = 700 + "px";
            } else if(window.innerWidth >= 1400) {
              popupImage.style.height = 650 + "px";
            } else if(window.innerWidth >= 1200) {
              popupImage.style.top = "7.5%";
              popupImage.style.height = 510 + "px";
            } else if(window.innerWidth >= 1100) {
              popupImage.style.height = 500 + "px";
              console.log(window.innerWidth, window.innerHeight)
            } else {
              popupImage.style.top = "9%";
              popupImage.style.height = 450 + "px";
            }
          }, 10);
        }
        // console.log(window.innerWidth, window.innerHeight)
        // console.log((image.height / image.width) * (window.innerWidth * 0.6))

        // function for closing popup image, first it will be return to the place where
        // it started then it will be removed totaly (deleted) after animation is over, in our case 300ms
        function closePopUpImage() {
          popupImage.style.width = image.width + "px";
          popupImage.style.height = image.height + "px";
          popupImage.style.left = image.offsetLeft + "px";
          popupImage.style.top = image.offsetTop + "px";
          popUpBackground.classList.remove("active");
          setTimeout(function () {
            popupContainer.remove();
          }, 300);
        }
      }
    });
  }

  // Start popup image function
  initImagePopup(".pop-up"); // elem = image container