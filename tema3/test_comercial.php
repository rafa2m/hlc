<?php
    include "comercial.php";
    //probando el patrón Singleton en PHP
    $comercial1 = Comercial::getComercial();
    $comercial1->setNombre('Rafa');
    $comercial1->setEmail('email@email.com');
    $comercial1->setDireccion('aaaaaaaaa');
    echo 'Primer comercial instanciado<br>';
    var_dump($comercial1);
    echo '<br>';
    $comercial2 = Comercial::getComercial();
    echo 'Segundo comercial instanciado, es el mismo que el primero<br>';
    $comercial1->setNombre('Félix');
    //después de cambiar el nombre al primer comercial
    //también se camibia en el segundo porque son el mismo objeto
    var_dump($comercial2);
    echo '<br>';
    var_dump($comercial1);
    
?>