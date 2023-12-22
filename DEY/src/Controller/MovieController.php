<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/movie')]
class MovieController extends AbstractController
{
    private $currentOrder = 'DESC';

    #[Route('/', name: 'app_movie_index', methods: ['GET'])]
    public function index($baseSearch = ""): Response
    {
        return $this->render('movie/index.html.twig', [
            'baseSearch' => $baseSearch
        ]);
    }

    #[Route('/search', name: 'app_movie_search', methods: ['GET'])]
    public function search(Request $request, MovieRepository $movieRepository, SerializerInterface $serializer)
    {
        $query = $request->query->get('search');
        $order = $request->query->get('order');
        if (!is_null($order) && $order != $this->currentOrder) {
            $this->currentOrder = $order;
        }

        $results = $movieRepository->findByName($query, $this->currentOrder);

        foreach ($results as $result) {
            $result->setCreationDate($result->getCreationDate()->setTimezone(new \DateTimeZone('Europe/Paris')));
        }

        $serializedResults = $this->serializeMovies($results, $serializer);

        return $this->json(['results' => $serializedResults]);
    }

    private function serializeMovies($movies, SerializerInterface $serializer)
    {
        $serializedMovies = [];

        foreach ($movies as $movie) {
            $tagsData = $serializer->serialize($movie->getTags(), 'json', ['groups' => 'movie']);
            $tagsArray = json_decode($tagsData, true);
            $serializedMovie = [
                'id' => $movie->getId(),
                'name' => $movie->getName(),
                'icon' => $movie->getIcon(),
                'description' => $movie->getDescription(),
                'themes' => $movie->getThemes(),
                'creationDate' => $movie->getCreationDate(),
                'tags' => $tagsArray,
            ];

            $serializedMovies[] = $serializedMovie;
        }

        return $serializedMovies;
    }

    #[Route('/new', name: 'app_movie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $movie->setCreationDateValue();
            $entityManager->persist($movie);
            $entityManager->flush();

            return $this->redirectToRoute('app_movie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('movie/new.html.twig', [
            'movie' => $movie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_movie_show', methods: ['GET'])]
    public function show(Movie $movie): Response
    {
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_movie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Movie $movie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_movie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('movie/edit.html.twig', [
            'movie' => $movie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_movie_delete', methods: ['POST'])]
    public function delete(Request $request, Movie $movie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $movie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($movie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_movie_index', [], Response::HTTP_SEE_OTHER);
    }
}
