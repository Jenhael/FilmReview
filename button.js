// pour account
  const btnMonProfil = document.getElementById('btnMonProfil');
  const btnMesFilms = document.getElementById('btnMesFilms');
  const divMonProfil = document.getElementById('divProfil');
  const divMesFilms = document.getElementById('divMesFilms');

btnMonProfil.addEventListener('click', () => {
    divMonProfil.style.display = "unset";
    divMesFilms.style.display = "none";
});

btnMesFilms.addEventListener('click', () => {
    divMonProfil.style.display = "none";
    divMesFilms.style.display = "grid";});

