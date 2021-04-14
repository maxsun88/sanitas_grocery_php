<!-- //reference https://code.tutsplus.com/tutorials/parse-xml-to-an-array-in-php-with-simplexml--cms-35529 -->


<?php

function getProducts(){
  $xml=simplexml_load_file("assets/products.xml") or die("Error: Cannot create object");
  return $xml;
}
