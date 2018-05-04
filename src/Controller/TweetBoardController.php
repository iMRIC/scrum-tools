<?php

namespace App\Controller;

use App\Entity\Sprint;
use App\Repository\SprintRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TweetBoardController extends Controller
{
    /**
     * @Route("/tweetboard", name="tweet_board")
     */
    public function index()
    {
        $sprint = $this->getDoctrine()
            ->getRepository(Sprint::class)
            ->findOneBy([], ['number' => 'DESC']);

        return $this->redirectToRoute('tweet_board_sprint', ['sprint' => $sprint->getId()]);
    }

    /**
     * @Route("/tweetboard/{sprint}", name="tweet_board_sprint")
     */
    public function boardForSprint($sprint)
    {
        $sprint = $this->getDoctrine()
            ->getRepository(Sprint::class)
            ->find($sprint);

        return $this->render('tweet_board/sprint.html.twig',
            [
                'sprint' => $sprint,
            ]);
    }
}
