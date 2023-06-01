<?php
class MexicanPizzaBuilder implements PizzaBuilderInterface
{
  public $pizza;

  public function __construct(Pizza $pizza)
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
    $this->pizza->toppings = ['bacon', 'greenPeppers', 'jalapenos', 'mushroom', 'olives', 'onion'];
  }

  public function setSauces()
  {
    $this->pizza->sauces = ['Tomato', 'Barbecue'];
  }
}
