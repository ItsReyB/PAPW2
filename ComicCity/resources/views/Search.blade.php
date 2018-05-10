@extends('template.template')
@section ('title')
Search
@endsection
@section('content')


  <div class="container-fluid">
  <div class="panel panel-default panel-transparent">
   
    <div class="panel-body filter">
      <div class="row filtertitle">
        <h3>Filters:</h3>
      </div>
      <div class="row">
        <form action="">
        <div class="col-sm-3">
          <h4>Date from:</h4>
            <input type="date" name="datefrom">
        </div>
         <div class="col-sm-3">
          <h4>Date to:</h4>
            <input type="date" name="dateto">
        </div>
        <div class="col-sm-2">
          <h4>By:</h4>
            <input type="radio" name="busquedapor" value="titulo">Title
            <br>
            <input type="radio" name="busquedapor" value="autor">Author
        </div>
        <div class="col-sm-4">
          <br>
          <br>
          <input type="submit" name="busquedafilter" value="Buscar" class="filtro">
        </div>
      </form>
      </div>
    </div>


  </div>
</div>

 <div class="container-fluid">
  <div class="panel panel-default panel-transparent">

    <div class="panel-body results">
      <div class="row resulttitle">
        <h3>Results:</h3>
      </div>
      <br>
     <div class="row">
          <div class="col-sm-2 resultados">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a> <br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
          </div>
    </div>

  </div>
</div>
@endsection

  





     
  