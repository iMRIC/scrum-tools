<?php

namespace App\Controller;

use App\Entity\Sprint;
use App\Entity\TweetMessage;
use App\Form\TweetMessageType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
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
            ->findOneBy([], ['number' => 'DESC']);

        return $this->redirectToRoute('tweet_board_sprint', ['sprint' => $sprint->getId()]);
    }

    /**
     * @Route("/tweet/board/{sprint}", name="tweet_board_sprint")
     */
    public function boardForSprint(Request $request, $sprint)
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