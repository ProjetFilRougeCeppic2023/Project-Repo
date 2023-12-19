// // Votre JavaScript pour la barre de recherche
//         // Utilisez jQuery pour simplifier les requêtes Ajax
//         $(document).ready(function() {
//             var searchInput = $('#search-input');
//             var searchResults = $('#search-results');

//             searchInput.on('input', function() {
//                 // Récupérez la valeur de la recherche
//                 var query = searchInput.val();

//                 // Envoyez une requête au serveur Symfony via Ajax
//                 $.ajax({
//                      url: '{{ path('app_movie_search') }}',
//                     method: 'GET',
//                     data: { query: query },
//                     dataType: 'json',
//                     success: function(data) {
//                         // Mettez à jour les résultats de la recherche dans l'interface utilisateur
//                         // Vous pouvez personnaliser cela en fonction de la structure des résultats de votre recherche
//                         searchResults.empty();
//                         data.results.forEach(function(result) {
//                             searchResults.append('<li>' + result.name + '</li>');
//                         });
//                     }
//                 });
//             });
//         });
document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search-input');
    var searchResults = document.getElementById('search-results');
    var searchUrl = document.getElementById('search-bar').getAttribute('data-search-url');

    searchInput.addEventListener('input', function () {
        var query = searchInput.value;

        fetch(searchUrl + '?query=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                // Parse la chaîne JSON ici
                console.log(data);
                const resultsArray = JSON.parse(data.results);

                searchResults.innerHTML = '';
                resultsArray.forEach(result => {
                    var li = document.createElement('li');
                    li.textContent = result.name;
                    searchResults.appendChild(li);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    });
});

