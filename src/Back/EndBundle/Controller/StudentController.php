<?php

namespace Back\EndBundle\Controller;

use Back\EndBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Student controller.
 *
 */
class StudentController extends Controller
{
    /**
     * Lists all student entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $students = $em->getRepository('BackEndBundle:Student')->findAll();

        return $this->render('BackEndBundle:Student:index.html.twig', array(
            'students' => $students,
        ));
    }

    /**
     * Creates a new student entity.
     *
     */
    public function newAction(Request $request)
    {
        $student = new Student();
        $form = $this->createForm('Back\EndBundle\Form\StudentType', $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            return $this->redirectToRoute('student_show', array('id' => $student->getId()));
        }

        return $this->render('BackEndBundle:Student:new.html.twig', array(
            'student' => $student,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a student entity.
     *
     */
    public function showAction(Student $student)
    {
        $em = $this->getDoctrine()->getManager();

        $modules = $em->getRepository('BackEndBundle:Module')->findAll();

        $deleteForm = $this->createDeleteForm($student);
        $score = 0 ;
        $coeff = 0 ;

        if($student->getScore() != null){
            foreach ($student->getScore() as $value){
                $score += $value->getTestScore() *  $value->getElement()->getCoeff();
                $coeff += $value->getElement()->getCoeff() ;

            }
        }
        if ($coeff!=0) {
            $moyenne = $score / $coeff;
        } else {
            $moyenne = 'Not calculated yet';
        }
        return $this->render('BackEndBundle:Student:show.html.twig', array(
            'modules' => $modules,
            'moyenne' => $moyenne,
            'student' => $student,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing student entity.
     *
     */
    public function editAction(Request $request, Student $student)
    {
        $deleteForm = $this->createDeleteForm($student);
        $editForm = $this->createForm('Back\EndBundle\Form\StudentType', $student);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('student_edit', array('id' => $student->getId()));
        }

        return $this->render('BackEndBundle:Student:edit.html.twig', array(
            'student' => $student,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a student entity.
     *
     */
    public function deleteAction(Request $request, Student $student)
    {
        $form = $this->createDeleteForm($student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($student);
            $em->flush();
        }

        return $this->redirectToRoute('student_index');
    }

    /**
     * Creates a form to delete a student entity.
     *
     * @param Student $student The student entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Student $student)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('student_delete', array('id' => $student->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
