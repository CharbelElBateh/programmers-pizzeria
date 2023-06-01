<?php
interface PizzaBuilderInterface
{
  public function setSize($size);
  public function setCrust($crust);
  public function setToppings();
  public function setSauces();
}
