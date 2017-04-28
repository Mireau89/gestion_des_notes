<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 4/28/2017
 * Time: 8:41 PM
 */

namespace Back\EndBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResultController extends Controller
{
 public function resultAction()
 {
     return $this->render('BackEndBundle:Result:result.html.twig');
 }
}