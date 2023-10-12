
let movieDiv = null;


function createMovieFromScratch()
{
    movieDiv = document.createElement("div");
    movieDiv.classList.add("movie");
}

function createMovie()
{
    if (movieDiv === null)
    {
        createMovieFromScratch();
    }
    return movieDiv.cloneNode(true);
}

export {createMovie};