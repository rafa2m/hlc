<?php
    require_once 'paginator.php';

    $conn= new mysqli('127.0.0.1','root','root','world');

    $limit= ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query = "SELECT city.Name, city.CountryCode, country.Code, country.Name AS Country, Country.Continent, Country.Region FROM City, Country WHERE city.CountryCode = country.Code";

    $pager = new Paginator($conn,$query);

    $results = $pager->getData($page,$limit);
?>
