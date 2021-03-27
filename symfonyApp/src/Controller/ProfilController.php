<?php

namespace App\Controller;

use App\Entity\WishList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WishListRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends AbstractController
{

    /**
     * @var WishListRepository
     */
    private $repository;

    public function __construct(WishListRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route("/users",name="profil")
     * @return Response
    */
    public function index()
    {
        return $this->render(view:'Pages/Profil.html.twig');
    }

    /**
     * @Route("/users/Wishlist",name="wishlistUsers")
     * @return Response
    */
    public function wishlist(PaginatorInterface $paginator,Request $request)
    {
        $user = $this->getUser();
        $wishlist = $paginator->paginate($this->repository->findWishlist($user), $request->query->getInt('page', 1), 2);
        dump($wishlist);
        return $this->render('Pages/WishList.html.twig', ['wishlist' => $wishlist]);
    }


    /**
     * @Route("/users/Wishlistdel/{id}", name="wishlistUsers.delete", methods="DELETE")
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function delete(WishList $wishlist, Request $request)
    {
        //Pour sécuriser la methode delete a l'aide de la vérification des tokens
        if($this->isCsrfTokenValid('delete' . $wishlist->getIdWishlist(), $request->get(key:'_token')))
        {
            $this->em = $this->getDoctrine()->getManager();
            $this->em->remove($wishlist);
            $this->em->flush();
            $this->addFlash(
                type:'success',
                message:'Supprimé avec succès'
                );
        }
        return $this->redirectToRoute(route: 'wishlistUsers');  
    }
}