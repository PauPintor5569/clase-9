<div class="col-sm-12">
<?php include('header.php');?>
<div class="inner cover">
  <h1 class="cover-heading">Top 100</h1>

</div>
  <section>
    <?php
    // basta con la línea de PHP para llamar al imdb-movies.csv y asignarlo a la variable $csv
    $csv = array_map('str_getcsv', file('data/Rotten_Tomatoes_100_Movies.csv'));
    // pero debo hacer un pequeño ajuste, para eliminar del arreglo el encabezado del imdb-movies.csv
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    // ahora puedo crear un bucle "for(){}" que examine lo asignado como contenido a la variable $csv
    // lo que esté contenido en la variable se repetirá tantas veces como arreglos tenga la variable $csv
    for($a = 0; $a < $total = count($csv); $a++){?>
      <article class="row">
        <hr>
        <div class="col-md-12">
          <h3><?php echo($a+1);?>. <?php echo $csv[$a]['Title'];?></h3>
          <h4>Rating: <?php echo $csv[$a]['Rating'];?> </h4>
          <p>Basado en <?php echo $csv[$a]['No. of Reviews'];?> opiniones.</p>
        </div>
      </article>
    <?php };?>
  </section>

  </div>
