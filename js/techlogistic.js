var elem = document.querySelector(".main-carousel");

console.log("elem", elem);

var flkty = new Flickity(elem, {
  // options
  cellAlign: "left",
  contain: true,
  wrapAround: true,
});

console.log("flkty", flkty);

// element argument can be a selector string for an individual element
var flkty = new Flickity(".main-carousel", {
  // Elements options
});
