// modal.js
const modal = document.getElementById('modal');
const openButtons = document.querySelectorAll('.voir-details');
// Fonction pour afficher le modal
function showModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'block';
}

// Fonction pour masquer le modal
function closeModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
}

// Écouteur d'événements pour le bouton de fermeture
const closeButton = document.getElementsByClassName('close')[0];
if (closeButton) {
    closeButton.addEventListener('click', closeModal);
}

// Écouteur d'événements pour les boutons "Voir les détails"
const detailButtons = document.getElementsByClassName('voir-details');
for (var i = 0; i < detailButtons.length; i++) {
    detailButtons[i].addEventListener('click', showModal);
}

// Récupérez la modal et les éléments de détail du film
const filmTitle = document.getElementById('filmTitle');
const filmDirectors = document.getElementById('filmDirectors');
const filmActors = document.getElementById('filmActors');
const filmYear = document.getElementById('filmYear');
const filmDuration = document.getElementById('filmDuration');
const filmGenres = document.getElementById('filmGenres');
const filmAgeRating = document.getElementById('filmAgeRating');
const filmSynopsis = document.getElementById('filmSynopsis');
const filmTrailerLink = document.getElementById('filmTrailerLink');

// Récupérez tous les boutons "Voir les détails" dans la liste des films
const voirDetailsButtons = document.querySelectorAll('.voir-details');

// Associez un gestionnaire d'événements à chaque bouton "Voir les détails"
voirDetailsButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Récupérez les données du film à partir des attributs data
        const titre = this.getAttribute('data-titre');
        const nomRealisateur = this.getAttribute('data-realisateur');
        const Nomsacteurs = this.getAttribute('data-acteurs');
        const anneeFilm = this.getAttribute('data-annee');
        const dureeFilm = this.getAttribute('data-duree');
        const themeFilm = this.getAttribute('data-theme');
        const ageRequis = this.getAttribute('data-age_requis');
        const synopsisFilm = this.getAttribute('data-synopsis');
        const urlFilm = this.getAttribute('data-url');

        // Mettez à jour le contenu de la modal avec les informations du film
        
        const realisateur = "Réalisé par : " + nomRealisateur;
        const acteurs = "Avec : " + Nomsacteurs;
        const annee = "Année de sortie : " + anneeFilm;
        const duree = "Durée : " + dureeFilm;
        const theme = "Genre : " + themeFilm;
        const age_requis = "Age recommandé : " + ageRequis;
        const synopsis = "Synopsis : " + synopsisFilm;
       
        document.getElementById("titre").textContent = titre;
        document.getElementById("realisateur").textContent = realisateur;
        document.getElementById("acteurs").textContent = acteurs;
        document.getElementById("annee").textContent = annee;
        document.getElementById("duree").textContent = duree;
        document.getElementById("theme").textContent = theme;
        document.getElementById("age_requis").textContent = age_requis;
        document.getElementById("synopsis").textContent = synopsis;
        document.getElementById("urlFilm").addEventListener("click", function() {
            // Redirigez l'utilisateur vers l'URL du film récupérée à partir de l'attribut data-url
            window.location.href = urlFilm;
        });
        

        // Affichez la modal
        modal.style.display = 'block';
    });
});

// Associez un gestionnaire d'événements pour fermer la modal lorsque l'utilisateur clique sur la croix
const closeBtn = document.querySelector('.close');
closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
});

// Fermez la modal si l'utilisateur clique en dehors de la modal
window.addEventListener('click', event => {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});

console.log