
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
    creationDateParagraph.textContent = `Creation date : ${result.CreationDate}`;
    cardBody.appendChild(creationDateParagraph);

  
    card.appendChild(cardBody);
  
    return card;
  }

  export { createCard };