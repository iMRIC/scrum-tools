<?php

namespace App\Controller;

use App\Entity\Sprint;
use App\Entity\TweetMessage;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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
    public function boardForSprint(Request $request, $sprint)
    {
        $sprint = $this->getDoctrine()
            ->getRepository(Sprint::class)
            ->find($sprint);

        $emptyTweet = new TweetMessage();
        $form = $this->createFormBuilder($emptyTweet)
            ->setAction($this->generateUrl('tweet_board_new_message'))
            ->add('message', TextType::class)
            ->add('sprint', HiddenType::class)
            ->add('save', SubmitType::class, ['label' => 'Tweet'])
            ->getForm();

        return $this->render('tweet_board/sprint.html.twig',
            [
                'newTweetForm' => $form->createView(),
                'sprint' => $sprint,
            ]);
    }

    /**
     * @Route("/tweetboard/message/new", name="tweet_board_new_message")
     */
    public function newTweet(Request $request)
    {
        $emptyTweet = new TweetMessage();
        $form = $this->createFormBuilder($emptyTweet)
            ->add('message', TextType::class)
            ->add('sprint', HiddenType::class)
            ->add('save', SubmitType::class, ['label' => 'Tweet'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emptyTweet = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($emptyTweet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tweet_board_sprint', ['sprint' => $emptyTweet->getSprint()->getId()]);
    }
}