import { createCard } from './cardTemplate.js';
// Assurez-vous que votre script est exécuté après le chargement du DOM
document.addEventListener('DOMContentLoaded', function() {
    // Récupérez la div #search-results
    const searchResultsContainer = document.getElementById('search-results');
  
    // Fonction pour mettre à jour les résultats de la recherche
    function updateSearchResults(results) {
      // Effacez le contenu actuel de la div #search-results
      searchResultsContainer.innerHTML = '';
  
      // Parcourez les résultats et créez des cartes pour chaque résultat
      results.forEach(result => {
        const card = createCard(result);
        searchResultsContainer.appendChild(card);
      });
    }
  
    // Ajoutez un écouteur d'événements htmx pour l'événement "htmx:afterSwap"
    searchResultsContainer.addEventListener('htmx:afterSwap', function(event) {
      // Récupérez le contenu mis à jour après le changement
      const updatedContent = event.detail.target.innerHTML;
  
      // Analysez le contenu JSON mis à jour
      try {
        const data = JSON.parse(updatedContent);
  
        // Vérifiez si les données contiennent des résultats
        if (Array.isArray(data.results)) {
          // Mettez à jour les résultats de la recherche avec les données reçues
          updateSearchResults(data.results);
        }
      } catch (error) {
        console.error('Erreur lors de l\'analyse du contenu mis à jour :', error);
      }
    });
  });


// document.addEventListener('DOMContentLoaded', function () {
//     var searchInput = document.getElementById('search-input');
//     var searchResults = document.getElementById('search-results');
//     var searchUrl = document.getElementById('search-bar').getAttribute('data-search-url');

//     searchInput.addEventListener('input', function () {
//         var query = searchInput.value;

//         fetch(searchUrl + '?query=' + encodeURIComponent(query))
//             .then(response => response.json())
//             .then(data => {
//                 // Parse la chaîne JSON ici
//                 console.log(data);
//                 const resultsArray = JSON.parse(data.results);

//                 searchResults.innerHTML = '';
//                 resultsArray.forEach(result => {
//                     var li = document.createElement('li');
//                     li.textContent = result.name;
//                     searchResults.appendChild(li);
//                 });
//             })
//             .catch(error => console.error('Error fetching data:', error));
//     });
// });

