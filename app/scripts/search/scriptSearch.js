import { createMovie } from "./modules/setupGrid.js";



console.log(1);
const movieGrid = document.getElementById("movieGrid");
console.log(2);
for (let i = 0; i<10;i++)
{
    const newMovie = createMovie();
    movieGrid.append(newMovie);
}