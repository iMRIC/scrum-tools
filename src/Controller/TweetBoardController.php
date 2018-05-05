<?php

namespace App\Controller;

use App\Entity\Sprint;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/tweet/board")
 */
class TweetBoardController extends Controller
{
    /**
     * @Route("/", name="tweet_board")
     */
    public function index()
    {
        $sprint = $this->getDoctrine()
            ->getRepository(Sprint::class)
            ->findOneBy([], ['number' => 'DESC']);

        return $this->redirectToRoute('tweet_board_sprint', ['sprint' => $sprint->getId()]);
    }

    /**
     * @Route("/{sprint}", name="tweet_board_sprint")
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