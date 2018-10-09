<?php
/**
 * Created by PhpStorm.
 * User: hp2
 * Date: 08/10/2018
 * Time: 20:31
 */

namespace App\Controller;
use App\Entity\Club;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Request;

class ClubController extends Controller
{
    /**-------------------------------METHOD GET -----------------------------------*/

    /**
     * @Route(name="GetAllClubs", path="/clubs")
     * @method ("GET")
     */
    public function GetAllClubs()
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $clubs = $this->getDoctrine()
            ->getRepository(Club::class)
            ->findAll();
        if (!$clubs) {
            throw $this->createNotFoundException(
                'No Equipe found '
            );
        }

        $serializer = new Serializer(array($normalizer), array($encoder));
        $response = New Response ($serializer->serialize($clubs,'json'));
        $response->headers->set('Content-Type', 'application/json', 'charset=utf-8');
        return $response;
    }


    /**
     * @Route(name="GetClubByID", path="/club/{id}", requirements={"id"="\d+"})
     * @method ("GET")
     */
    public function GetClubByID($id)
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $club = $this->getDoctrine()
            ->getRepository(Club::class)
            ->find($id);
        if (!$club) {
            throw $this->createNotFoundException(
                'No Equipe found '
            );
        }
        $serializer = new Serializer(array($normalizer), array($encoder));
        $response = New Response ($serializer->serialize($club,'json'));
        $response->headers->set('Content-Type', 'application/json', 'charset=utf-8');
        return $response;
    }



    /**-------------------------------METHOD POST -----------------------------------*/
    /**
     * @Route(name="PostClub", path="/club")
     * @method ("POST")
     */
    public function PostClub(Request $request)
    {
        $club=new Club();
        $club->setNomClub($request->query->get('nomClub'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($club);
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
            $equipe->setCategory($request->query->get('category'));
            $equipe->setSexe($request->query->get('sexe'));
            $equipe->setDivision($request->query->get('division'));
            $equipe->setPoule($request->query->get('poule'));
            $equipe->setNiveau($request->query->get('niveau'));
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