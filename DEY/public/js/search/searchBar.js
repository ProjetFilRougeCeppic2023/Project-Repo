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


