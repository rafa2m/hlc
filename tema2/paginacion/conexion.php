<?php
    require_once 'paginator.php';

    $conn= new mysqli('127.0.0.1','root','root','world');
    //límite de registros por página
    $limit= ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    //página por defecto, la primera
    $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    //se establecen el mismo número de enlaces que registros por página
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 25;
    $query = "SELECT city.Name, city.CountryCode, country.Code, country.Name AS Country, country.Continent, country.Region FROM city, country WHERE city.CountryCode = 'ESP' AND country.Code='ESP'";
    //se construye una instancia del paginador que será utilizada en index.php
    $pager = new Paginator($conn,$query);
    //se obtiene el conjunto de resultados, registros de la página elegida
    $results = $pager->getData($limit,$page);
?>
