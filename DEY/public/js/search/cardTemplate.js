
const createCard = (result) => {
    const card = document.createElement('div');
    card.classList.add('card');
  
    const clickableElement = document.createElement('a');
    const cardHeader = document.createElement('div');
    
    clickableElement.href = `/movie/` + result.id;
    cardHeader.classList.add('card-header');
    cardHeader.textContent = `${result.name}`;
    clickableElement.appendChild(cardHeader);
    card.appendChild(clickableElement);
  
    const cardBody = document.createElement('div');
    cardBody.classList.add('card-body');
    cardBody.textContent = `${result.description}`;
    
    const themeParagraph = document.createElement('p');
    themeParagraph.textContent = `Theme: ${result.themes}`;
    cardBody.appendChild(themeParagraph);

    const creationDateParagraph = document.createElement('p');
     // Convertir la date en objet Date
     const creationDate = new Date(result.CreationDate);
    
     // Obtenez les composants de la date
     const day = creationDate.getDate().toString().padStart(2, '0');
     const month = (creationDate.getMonth() + 1).toString().padStart(2, '0');
     const year = creationDate.getFullYear();
     const hour = creationDate.getHours().toString().padStart(2, '0');
     const minute = creationDate.getMinutes().toString().padStart(2, '0');
 
     const formattedDate = `${day}/${month}/${year} ${hour}:${minute}`;
     
     console.dir(creationDate);
 
     creationDateParagraph.textContent = `Creation date: ${formattedDate}`;
     cardBody.appendChild(creationDateParagraph);

  
    card.appendChild(cardBody);
  
    return card;
  }

  export { createCard };