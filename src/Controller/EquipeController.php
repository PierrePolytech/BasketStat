<?php

namespace App\Controller;
use App\Entity\Equipe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Request;


class EquipeController extends Controller
{
    /**-------------------------------METHOD GET -----------------------------------*/

    /**
     * @Route(name="GetAllEquipes", path="/equipes")
     * @method ("GET")
     */
    public function GetAllEquipes()
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $equipes = $this->getDoctrine()
            ->getRepository(Equipe::class)
            ->findAll();
        if (!$equipes) {
            throw $this->createNotFoundException(
                'No Equipe found '
            );
        }

        $serializer = new Serializer(array($normalizer), array($encoder));
        $response = New Response ($serializer->serialize($equipes,'json'));
        $response->headers->set('Content-Type', 'application/json', 'charset=utf-8');
        return $response;
    }


    /**
     * @Route(name="GetEquipeByID", path="/equipe/{id}", requirements={"id"="\d+"})
     * @method ("GET")
     */
    public function GetEquipeByID($id)
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $equipe = $this->getDoctrine()
            ->getRepository(Equipe::class)
            ->find($id);
        if (!$equipe) {
            throw $this->createNotFoundException(
                'No Equipe found '
            );
        }
        $serializer = new Serializer(array($normalizer), array($encoder));
        $response = New Response ($serializer->serialize($equipe,'json'));
        $response->headers->set('Content-Type', 'application/json', 'charset=utf-8');
        return $response;
    }



    /**-------------------------------METHOD POST -----------------------------------*/
    /**
     * @Route(name="PostEquipe", path="/equipe")
     * @method ("POST")
     */
    public function PostEquipe(Request $request)
    {
        $equipe=new Equipe();
        $equipe->setNomEquipe($request->query->get('nomEquipe'));
        $equipe->setClub($request->query->get('club'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($equipe);
        $em->flush();
    }

    /**-------------------------------METHOD PUT -----------------------------------*/
    /**
     * @Route(name="PutEquipeByID", path="/equipe/{id}", requirements={"id"="\d+"})
     * @method ("PUT")
     */
    public function PutEquipeByID($id, Request $request)
    {
        $equipe = $this->getDoctrine()
            ->getRepository(Equipe::class)
            ->find($id);
        if ($equipe) {
            $equipe->setNomEquipe($request->query->get('nomEquipe'));
            $equipe->setClub($request->query->get('club'));
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($equipe);
        $em->flush();
    }

    /**-------------------------------METHOD DELETE -----------------------------------*/
    /**
     * @Route(name="DeleteEquipeByID", path="/equipe/{id}", requirements={"id"="\d+"})
     * @method ("DELETE")
     */
    public function DeleteEquipeByID($id)
    {
        $equipe = $this->getDoctrine()
            ->getRepository(Equipe::class)
            ->find($id);
        if ($equipe) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipe);
            $em->flush();
        }
    }

    /**-------------------------------METHOD PATCH -----------------------------------*/

}
?>