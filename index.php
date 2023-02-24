<?php

try {
	$pdo = new PDO('mysql:dbname=mosaic; host=localhost', 'root', '04091989');
} catch (PDOException $e) {
	die($e->getMessage());
}

$sql = $pdo->prepare("SELECT * FROM `mosaic`");
$sql->execute();
$result = $sql->fetchAll();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="kkvvnn">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Мозаика Test</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    

<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">О нас</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">+7(999)999-99-99</a></li>
            <!-- <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg> -->
        <strong>Test</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <!-- <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Мозаика</h1>
        <p class="lead text-muted">Примеры коллекции мозаики.</p> -->
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p> -->
      <!-- </div>
    </div>
  </section> -->

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      
      <!-- *************************************************************** -->

      <?php foreach($result as $row): ?>
        
        <div class="col">
          <div class="card shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <img src="http://pixmosaic.ru/bitrix/catalog_export/<?=$row['img_url']?>" class="img-fluid" alt="...">
            <div class="card-body">
              <p class="card-text"><?= $row['title'] ?>.</p>
              <div class="d-flex justify-content-between align-items-center">
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div> -->
                 <h5>арт. <?=$row['vendor_code']?></h5>
                 <br>
                 <h5>Цена <span class="badge text-bg-success"><?=$row['price']*75?> Р</span></h5>
              

                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-vendor_code="<?= $row['vendor_code'] ?>" data-title="<?= $row['title'] ?>" data-imgtovara="http://pixmosaic.ru/bitrix/catalog_export/<?=$row['img_url']?>" data-pricetovar="<?=$row['price']*75?>" data-bs-target="#exampleModal" >Заказать</button>

                  



                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
          </div>
        </div>
        
        <?php endforeach; ?>

        <!-- ******************************************************************* -->

      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Вернуться в начало</a>
    </p>
    <!-- <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p> -->
  </div>
</footer>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Новый заказ</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <div class="row">
            <div class="col-sm-3 tovarimg"></div>
            <div class="col-sm-9 tovarinfo"></div>
        </div> -->

        <div class="kartka">
          <h1></h1>
          <div class="col-sm-3 tovarimg">
            <img src="" alt="" />
          </div>
          <p></p>
        </div>
        
        <form action="r.php">
          <input type="hidden" id= "vendor_code" name="vendor_code" value="">
          <input type="hidden" id= "img_url" name="img_url" value="">
          <input type="hidden" id= "price" name="price" value="">
          <input type="hidden" id= "title" name="title" value="">
          <div class="mb-3">
            <label for="name" class="col-form-label">Ваше имя:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="=phone" class="col-form-label">Ваш телефон:</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div><div class="mb-3">
            <label for="count" class="col-form-label">Количество:</label>
            <input type="text" class="form-control" id="phone" name="count">
          </div>
          <div class="mb-3">
            <label for="text" class="col-form-label">Сообщение:</label>
            <textarea class="form-control" id="text" name="text"></textarea>
          </div>
          <!-- <input id="hide1" type="hidden" value="" name="title">
          <input id="hide2" type="hidden" value="" name="price">
          <input id="hide3" type="hidden" value="" name="vendor_code">
          <input id="hide4" type="hidden" value="" name="price"> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary">Отправить</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script
			  src="https://code.jquery.com/jquery-3.6.3.min.js"
			  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
			  crossorigin="anonymous"></script>
    <script>
      $(function() {
  $(".btn").click(
    function() {
      var imgtovara = $(this).attr('data-imgtovara');
      var vendor = $(this).attr('data-vendor_code');
      var pricetovar = $(this).attr('data-pricetovar');
      var title = $(this).attr('data-title');

      // $(".tovarimg").append('<img class="img-fluid" src="' + imgtovara + '" alt="..." />');
      // $(".tovarinfo").append('<p class="h3">' + nametitle + '</h1>');
      // $(".tovarinfo").append('<p><strong>Цена</strong>:' + pricetovar + '</p>');
      // $(".kartka h1").text(nametitle);
      // $(".kartka img").attr('src', imgtovara);
      // $(".kartka p").html(pricetovar);
      $("#vendor_code").attr('value', vendor);
      $("#price").attr('value', pricetovar);
      $("#img_url").attr('value', imgtovara);
      $("#title").attr('value', title);
    })
});
    </script>

      
  </body>
</html>
