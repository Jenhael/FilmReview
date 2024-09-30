const addToWatchlist = document.querySelectorAll(".addToWatchlist");
const addToFavButtons = document.querySelectorAll(".addToFav");

addToWatchlist.forEach(function (button) {
    button.addEventListener("click", function () {
        const id_films = document.querySelector('input[name="id_films"]').value;
        checkWatchlistStatus(id_films, button);});});

addToFavButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        const id_films = document.querySelector('input[name="id_films"]').value;
        checkFavStatus(id_films, button);});});

function checkWatchlistStatus(id_films, button) {
    fetch("AddToList.php?action=add", {
            method: "POST",
            body: JSON.stringify({ id_films }),
            headers: {
                'Content-Type': 'application/json',},})
        .then((response) => response.json())
        .then((data) => {
            if (data.watchlist) {
                button.innerHTML = "&#x2713";
            } else {
                button.innerHTML = "+";
            }})
        .catch((error) => {
            console.error('Erreur lors de la requête fetch :', error);});}
