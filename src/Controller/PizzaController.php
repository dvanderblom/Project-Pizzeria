<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Entity\Order;
use App\Entity\Size;
use App\Controller\Category;
use App\Controller\Controller;
use App\Controller\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextAreaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Query\QueryBuilder;

class PizzaController extends AbstractController {

  /**
   * @Route("/categorieën", name="categories")
   */
  
  public function index() {
    $entityManager = $this->getDoctrine()->getManager();
    
    $query = $entityManager->createQuery("SELECT c FROM App\Entity\Category c");
    $categories = $query->execute();

    return $this->render('index.html.twig', array('categories' => $categories));
  }

  /**
   * @Route("/", name="home")
   */
  
  public function home() {
    return $this->render('home.html.twig');
  }

   /**
   * @Route("/inloggen", name="inloggen")
   */
  
  public function inloggen() {
    $entityManager = $this->getDoctrine()->getManager();
    
    $query = $entityManager->createQuery("SELECT o FROM App\Entity\Order o");
    $result = $query->execute();

    return $this->render('inloggen.html.twig', array('orders' => $result));
  }

  /**
  * @Route("/categorieën/{pizzaCategory}", name="categorieën")
  */
  
  public function getPizza($pizzaCategory) {
    $entityManager = $this->getDoctrine()->getManager();
    
    $query = $entityManager->createQuery("SELECT p FROM App\Entity\Pizza p WHERE p.category = :pizzaCategory")->setParameter('pizzaCategory', $pizzaCategory);
    $result = $query->execute();

    return $this->render('pizzas.html.twig', array('pizzas' => $result));
  }

  /**
   * @Route("/order", name="order")
   */

  public function order() {
    if(!empty($_POST['pizza'])) {
      $pizza = $_POST['pizza'];
    }

    $entityManager = $this->getDoctrine()->getManager();
    
    $query = $entityManager->createQuery("SELECT s FROM App\Entity\Size s");
    $sizes = $query->execute();

    return $this->render('order.html.twig', array('pizza' => $pizza, 'sizes' => $sizes));
  }

  /**
   * @Route("/overzicht", name="overzicht")
   */

  public function overview() {
    $size = $_POST['size'];
    $fullName = $_POST['fullname'];
    $adress = $_POST['adress'];
    $pizza = $_POST['pizza'];

    $entityManager = $this->getDoctrine()->getManager();

    $order = new Order();
    $order->setSize($size);
    $order->setCustomer($fullName);
    $order->setAdress($adress);
    $order->setPizza($pizza);

    $entityManager->persist($order);
    $entityManager->flush();

    return $this->render('overzicht.html.twig', 
    array('size' => $size, 'fullname' => $fullName, 'adress' => $adress, 'pizza' => $pizza));
  }
}