//fonctionnalité de recherche d'hackathon
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    searchButton.addEventListener('click', function() {
        const searchTerm = searchInput.value.toLowerCase();
        const hackathonCards = document.querySelectorAll('.card');

        hackathonCards.forEach(function(card) {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

//désactivation de la touche entrée - NON FONCTIONNEL
$('#searchInput').keydown( function(){
    if ( event.which == 13 )
    {
        event.preventDefault();
    }
});