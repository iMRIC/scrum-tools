<?php

namespace App\Controller;

use App\Entity\Sprint;
use App\Repository\SprintRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TweetBoardController extends Controller
{
    /**
     * @Route("/tweet/board", name="tweet_board")
     */
    public function index()
    {
        $sprint = $this->getDoctrine()
            ->getRepository(Sprint::class)
            ->findOneBy([], ['id' => 'DESC']);

        return $this->render('tweet_board/index.html.twig',
            [
                'sprint' => $sprint,
            ]);
    }
}
