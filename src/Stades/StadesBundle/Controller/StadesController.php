<?php

namespace Stades\StadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Stades\StadesBundle\UrlMapsConverter\StadesUrlMapsConverter;
use Stades\StadesBundle\GenerateMapsUrl\StadesGenerateMapsUrl;
use Stades\StadesBundle\Entity\Stades;
use Stades\StadesBundle\Entity\TypeTerrain;
use Stades\StadesBundle\Form\StadesType;
use Stades\StadesBundle\Form\StadesSearchType;

class StadesController extends Controller
{
    public function indexAction()
    {
        $stadeRepository = $this->getDoctrine()->getManager()->getRepository('StadesStadesBundle:Stades');
        /**
         * Pour l'instant, la page d'accueil retourne le dernier stade ajouté
         */
        $stade = $stadeRepository->getLastStade();
        
        // Nombre de stades au total
        $stadeCount = $stadeRepository->getCountStades();

        if (null === $stade) {
            throw new NotFoundHttpException("Aucun stade :-(");
        }
        
        return $this->render('StadesStadesBundle:Stades:index.html.twig', array(
            'stade' => $stade,
            'count' => $stadeCount
        ));
    }
    
    public function viewAction($id)
    {        
        $stade = $this->getDoctrine()->getManager()->getRepository('StadesStadesBundle:Stades')->find($id);
        
        if (null === $stade) {
            throw new NotFoundHttpException("Le stade n'existe pas.");
        }
        
        // Lien vers la carte
        $lat = $stade->getLatitude();
        $lon = $stade->getLongitude();
        
        $url = $this->container->get('stades_stades.generatemapsurl');
        $urlMapsEmbed = $url->generateUrlEmbed($lat, $lon);
        $urlMaps = $url->generateUrlMaps($lat, $lon);
        
        return $this->render('StadesStadesBundle:Stades:view.html.twig', array(
            'stade' => $stade,
            'urlEmbed' => $urlMapsEmbed,
            'url' => $urlMaps
        ));
    }
    
    public function addAction(Request $request)
    {
        $stade = new Stades();
        $formAdd = $this->get('form.factory')->create(new StadesType(), $stade);
        
        if ($formAdd->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stade);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Stade bien enregistré.');
            
            return $this->redirect($this->generateUrl('stades_stades_view', array('id' => $stade->getId())));
        }
        
        return $this->render('StadesStadesBundle:Stades:add.html.twig', array(
            'form' => $formAdd->createView()
        ));
    }
    
    public function editAction(Request $request, $id)
    {
        $stade = new Stades();
        
        $em = $this->getDoctrine()->getManager();
        
        $stade = $em->getRepository('StadesStadesBundle:Stades')->find($id);
        
        $formEdit = $this->get('form.factory')->create(new StadesType(), $stade);
        
        if (null === $stade) {
            throw new NotFoundHttpException("Le stade n'existe pas.");
        }
        
        if ($formEdit->handleRequest($request)->isValid()) {
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Stade bien mis à jour.');
            
            return $this->redirect($this->generateUrl('stades_stades_view', array('id' => $stade->getId())));
        }
        
        return $this->render('StadesStadesBundle:Stades:edit.html.twig', array(
            'stade' => $stade,
            'form' => $formEdit->createView()
        ));
    }
    
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $stade = $em->getRepository('StadesStadesBundle:Stades')->find($id);
        
        if (null === $stade) {
            throw new NotFoundHttpException("Le stade n'existe pas.");
        }
        
        $form = $this->createFormBuilder()->getForm();
        
        if ($request->isMethod('POST')) {
            $em->remove($stade);
            
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Stade bien supprimé.');
            
            return $this->redirect($this->generateUrl('stades_stades_homepage'));
        }
        
        return $this->render('StadesStadesBundle:Stades:delete.html.twig', array(
            'stade' => $stade,
            'form' => $form->createView()
        ));
    }
    
    public function searchAction(Request $request)
    {
        $formSearch = $this->createFormBuilder()->getForm();
        
        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('stades_stades_searchResults'));
        }
        
        return $this->render('StadesStadesBundle:Stades:formSearch.html.twig', array(
            'formSearch' => $formSearch->createView()
        ));
    }
    
    public function listStadesAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $query = $request->get('nomStade');
            
            if ($query != null && trim($query) != "") {
                $stades = $em->getRepository('StadesStadesBundle:Stades')->getListStades($query);
            }
            else {
                $stades = null;
            }
            
            return $this->render('StadesStadesBundle:Stades:searchResults.html.twig', array(
                'stades' => $stades,
                'query' => $query
            ));
        } else {
             return $this->redirect($this->generateUrl('stades_stades_homepage'));
        }
    }
}