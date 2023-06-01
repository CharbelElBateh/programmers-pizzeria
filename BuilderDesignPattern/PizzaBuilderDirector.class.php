<?php

class PizzaBuilderDirector
{

  public function build(PizzaBuilderInterface $builder, $size, $crust)
  {
    $builder->setSize($size);
    $builder->setCrust($crust);
    $builder->setToppings();
    $builder->setSauces();

    return $builder->pizza;
  }

  public function customBuild(CustomPizzaBuilder $builder, $size, $crust, $toppings, $sauces)
  {
    $builder->setSize($size);
    $builder->setCrust($crust);
    $builder->setToppings($toppings);
    $builder->setSauces($sauces);

    return $builder->pizza;
  }
}
