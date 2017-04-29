<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 4/28/2017
 * Time: 8:41 PM
 */

namespace Back\EndBundle\Controller;

use Back\EndBundle\Entity\Score;
use Back\EndBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ResultController extends Controller
{
 public function resultAction()
 {
     $em = $this->getDoctrine()->getManager();
     $students = $em->getRepository('BackEndBundle:Student')->findAll();
     $i = 0 ;
     $resultat  = array() ;
     foreach ($students as $student ){
         $score = 0 ;
         $coeff = 0 ;
         if($student->getScore() != null){
             foreach ($student->getScore() as $value){
                 $score += $value->getTestScore() *  $value->getElement()->getCoeff();
                 $coeff += $value->getElement()->getCoeff() ;
                echo $score."<br/>";
                 echo $coeff."<br/>";
             }
         }
         $moyenne = $score / $coeff ;
         $resultat[$i]['student'] = $student ;
         $resultat[$i]['moyenne'] = $moyenne ;
         $i ++ ;
     }


     return $this->render('BackEndBundle:Result:result.html.twig',array(
         'resultat' => $resultat
     ));
 }

    public function resultModuleAction(Student $student)
 {
     $em = $this->getDoctrine()->getManager();

     $modules = $em->getRepository('BackEndBundle:Module')->findAll();
     return $this->render('BackEndBundle:Result:resultModule.html.twig',array(
     'modules' => $modules,
     'student' => $student
     ));
 }

}