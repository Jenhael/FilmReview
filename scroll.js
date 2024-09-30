const scrollLeft = document.querySelector(".scroll-left");
const scrollRight = document.querySelector(".scroll-right");
//code pour le défilement.

scrollLeft.addEventListener("click", () => {
    filmlist.scrollBy({
      left: -800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
  
  scrollRight.addEventListener("click", () => {
    filmlist.scrollBy({
      left: 800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
const filmlist = document.querySelector(".filmlist");
// Afficher les boutons de défilement lorsque le contenu dépasse la largeur de la fenêtre
  filmlist.addEventListener("scroll", () => {
    if (filmlist.scrollLeft > 0) {
      scrollLeft.style.display = "block";
    } else {
      scrollLeft.style.display = "none";
    }
  
    if (
      filmlist.scrollLeft + filmlist.clientWidth <
      filmlist.scrollWidth
    ) {
      scrollRight.style.display = "block";
    } else {
      scrollRight.style.display = "none";
    }
  });
  const scrollLeft2 = document.querySelector(".scroll-left2");
const scrollRight2 = document.querySelector(".scroll-right2");

const filmlist2 = document.querySelector(".filmlist2");
scrollLeft2.addEventListener("click", () => {
    filmlist2.scrollBy({
      left: -800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
  
  scrollRight2.addEventListener("click", () => {
    filmlist2.scrollBy({
      left: 800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
filmlist2.addEventListener("scroll", () => {
    if (filmlist2.scrollLeft > 0) {
      scrollLeft2.style.display = "block";
    } else {
      scrollLeft2.style.display = "none";
    }
  
    if (
      filmlist2.scrollLeft + filmlist2.clientWidth <
      filmlist2.scrollWidth
    ) {
      scrollRight2.style.display = "block";
    } else {
      scrollRight2.style.display = "none";
    }
  });
  const scrollLeft3 = document.querySelector(".scroll-left3");
const scrollRight3 = document.querySelector(".scroll-right3");
const filmlist3 = document.querySelector(".filmlist3");
scrollLeft3.addEventListener("click", () => {
    filmlist3.scrollBy({
      left: -800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
  
  scrollRight3.addEventListener("click", () => {
    filmlist3.scrollBy({
      left: 800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
 filmlist3.addEventListener("scroll", () => {
    if (filmlist3.scrollLeft > 0) {
      scrollLeft3.style.display = "block";
    } else {
      scrollLeft3.style.display = "none";
    }
  
    if (
      filmlist3.scrollLeft + filmlist3.clientWidth <
      filmlist3.scrollWidth
    ) {
      scrollRight3.style.display = "block";
    } else {
      scrollRight3.style.display = "none";
    }
  });
  const scrollLeft4 = document.querySelector(".scroll-left4");
const scrollRight4 = document.querySelector(".scroll-right4");


const filmlist4 = document.querySelector(".filmlist4");


  
  

  

  scrollLeft4.addEventListener("click", () => {
    filmlist4.scrollBy({
      left: -800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
  
  scrollRight4.addEventListener("click", () => {
    filmlist4.scrollBy({
      left: 800 , // Ajustez la valeur en fonction du défilement souhaité
      behavior: "smooth", // Animation de défilement en douceur
    });
  });
  
  
  
  

 

  filmlist4.addEventListener("scroll", () => {
    if (filmlist4.scrollLeft > 0) {
      scrollLeft4.style.display = "block";
    } else {
      scrollLeft4.style.display = "none";
    }
  
    if (
      filmlist4.scrollLeft + filmlist4.clientWidth <
      filmlist2.scrollWidth
    ) {
      scrollRight4.style.display = "block";
    } else {
      scrollRight4.style.display = "none";
    }
  });