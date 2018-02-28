alert("ola");

function mouseOut() {
  
  var lens = document.getElementById('myresult').className = " ";
  
 }

function mouseHover() {
  
  var item = document.getElementById('myresult').className = "img-zoom-result";

  var el = document.getElementById('images');  
 
  el.addEventListener('mouseover', function(e) {
    var el = document.getElementById("images").src;
   // alert(e.target.id);
    //Calling imageZoom function passing id
    if (e.target.id == "imagehover2") {
      imageZoom(e.target.id, "myresult");
    }  
      
    if (e.target.src !== undefined){      
     document.getElementById("imagehover2").src = e.target.src;        
    }     
  });
    
}

function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);

  //create lens  
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");

  //insert lens 
  img.parentElement.insertBefore(lens, img);

  //calculate the ratio between result DIV and lens
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;

  //set background properties for the result DIV
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";

  //execute a function when someone moves the cursor over the image, or the lens
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);

  //and also for touch screens
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);

  function moveLens(e) {
    var pos, x, y;

    //Prevent any other actions that may occur when moving over the image
    e.preventDefault();

    //Get the cursor's x and y positions
    pos = getCursorPos(e);
    
    //Calculate the positions of the lens
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);

    //Prevent the lens from being positioned outside the image
    if (x > img.width - lens.offsetWidth) {
      x = img.width - lens.offsetWidth;      
    }
    if (x < 0) {
      x = 0;
    }
    if (y > img.height - lens.offsetHeight) {
      y = img.height - lens.offsetHeight;
    }
    if (y < 0) {
      y = 0;
    }

    //set the position of the lens
    lens.style.left = x + "px";
    lens.style.top = y + "px";

    //Display what the lens "sees"
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    
    //get the x and y positions of the image
    a = img.getBoundingClientRect();

    //calculate the cursor's x and y coordinates, relative to the image
    x = e.pageX - a.left;
    y = e.pageY - a.top;

    //consider any page scroling
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {
      x : x, y : y
    };
  }
}