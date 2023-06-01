<?php
class CustomPizzaBuilder
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

  public function setToppings($toppings)
  {
    $this->pizza->toppings = $toppings;
  }

  public function setSauces($sauces)
  {
    $this->pizza->sauces = $sauces;
  }
}
