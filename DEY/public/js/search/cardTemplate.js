
const createCard = (result) => {
    const card = document.createElement('div');
    card.classList.add('card');
  
    const cardHeader = document.createElement('div');
    cardHeader.classList.add('card-header');
    cardHeader.textContent = `${result.name}`;
    card.appendChild(cardHeader);
  
    const cardBody = document.createElement('div');
    cardBody.classList.add('card-body');
    cardBody.textContent = `${result.description}`;
    
    const themeParagraph = document.createElement('p');
    themeParagraph.textContent = `Theme: ${result.themes}`;
    cardBody.appendChild(themeParagraph);
  
    card.appendChild(cardBody);
  
    return card;
  }

  export { createCard };