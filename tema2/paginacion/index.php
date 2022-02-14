<?php include 'conexion.php';?>
<!DOCTYPE html>
    <head>
        
        <title>PHP Pagination</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
                <div class="col-md-10 col-md-offset-1">
                <h1>PHP Pagination</h1>
                <!-- Se crean los botones de navegación con ayuda de Bootstrap -->
                <?php echo $pager->createLinks($links,'pagination','page-item','page-link'); ?> 
                <!-- Se crea la tabla con los datos de las ciudades y formato Bootstrap -->
                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                                <tr>
                                <th>City</th>
                                <th width="20%">Country</th>
                                <th width="20%">Continent</th>
                                <th width="25%">Region</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
                                <tr>
                                  <td><?php echo $results->data[$i]['Name']; ?></td>
                                  <td><?php echo $results->data[$i]['Country']; ?></td>
                                  <td><?php echo $results->data[$i]['Continent']; ?></td>
                                  <td><?php echo $results->data[$i]['Region']; ?></td>
                                </tr>
                                <?php endfor; ?>
                        </tbody>
                </table>

                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
</html>
