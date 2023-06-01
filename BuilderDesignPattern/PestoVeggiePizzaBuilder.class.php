<?php
class PestoVeggiePizzaBuilder implements PizzaBuilderInterface
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
    $this->pizza->toppings = ['greenPeppers', 'mushrooms', 'olives', 'onion', 'tomato'];
  }

  public function setSauces()
  {
    $this->pizza->sauces = ['Tomato', 'Pesto'];
  }
}
