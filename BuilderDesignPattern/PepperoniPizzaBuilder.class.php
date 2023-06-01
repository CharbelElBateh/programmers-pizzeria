<?php
class PepperoniPizzaBuilder implements PizzaBuilderInterface
{
  public $pizza;

  public function __construct($pizza)
  {
    $this->pizza = $pizza;
  }

  public function setSize($size)
  {
    $this->pizza->size = $size;
  }

  public function setCrust($crust)
  {
    $this->pizza->crust = $crust;
  }

  public function setToppings()
  {
    $this->pizza->toppings = ['greenPeppers', 'pepperoni', 'tomato'];
  }

  public function setSauces()
  {
    $this->pizza->sauces = ['Tomato', 'GarlicHerb'];
  }
}
