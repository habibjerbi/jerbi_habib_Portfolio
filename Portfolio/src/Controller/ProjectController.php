<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{


    /**
     * @Route("/portfolio", name="project/portfolio")
     */
    public function portfolio(): Response
    {
        return $this->render('project/protfolio.html.twig');
    }

    /**
     * @Route("/addProject", name="addProject")
     */
    public function addproject(\Symfony\Component\HttpFoundation\Request $request){
        $project = new Project();
        $formProject = $this->createForm(ProjectType::class,$project);
        $formProject ->handleRequest($request);
        if($formProject->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute("listProject");
        }

        return $this->render("project/addProject.html.twig",array('formProject'=>$formProject->createView()));
    }

    /**
     * @Route("/listProject", name="listProject")
     */
    public  function listProject()
    {
        $projects=$this->getDoctrine()->getRepository(Project::class)->findAll();
        return $this->render("project/listproject.html.twg",array('listProjects'=>$projects));
    }

    /**
     * @Route("/showProject/{id}", name="showProject")
     */

    public function showProject($id){
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        //var_dump($project).die();
        return $this->render("project/showProject.html.twig",array('project'=>$project));
    }


}
