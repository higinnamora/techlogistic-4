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

// Mostrar desplazamiento superior
function scrollTop() {
  const scrollTop = document.getElementById("scroll-top");
  // cuando el desplazamiento es superior a la altura de la ventana gráfica 560, agregue la clase show-scroll a la etiqueta scroll-top
  if (this.scrollY >= 560) scrollTop.classList.add("scroll-top");
  else scrollTop.classList.remove("scroll-top");
}

window.addEventListener("scroll", scrollTop);

// Animación de revelación de desplazamiento
const sr = ScrollReveal({
  origin: "bottom",
  distance: "20px",
  duration: 2000,
  reset: null,
});

sr.reveal(
  ".hero__data, .hero__img, .about__data, .features, .features-card, .banner, .big-card, .clients__card, .banner-chart, .contact, .copyright",
  {
    interval: 100,
  }
);
