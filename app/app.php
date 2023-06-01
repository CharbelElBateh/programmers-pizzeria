<?php

//When using a function/variable/etc... from another php file 'requiring' the file is needed
//To avoid cluttering all headers of all files with require statements a file needs to be created
//This file requires all the files so files need to require just this file

require_once('functions.php');
require_once('./BuilderDesignPattern/PizzaBuilder.interface.php');

foreach (glob("./BuilderDesignPattern/*.php") as $filename) {
  require_once $filename;
}

foreach (glob("./data/*.php") as $filename) {
  require_once $filename;
}
