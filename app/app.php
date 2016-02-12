<?php
      require_once __DIR__."/../vendor/autoload.php";
      require_once __DIR__."/../src/cd.php";

      session_start();
      if (empty($_SESSION['list_of_cds'])){
        $_SESSION['list_of_cds'] = array();
      }

      $app = new Silex\Application();
      $app->register(new Silex\Provider\TwigServiceProvider, array(
        'twig.path' => __DIR__."/../views"
      ));

      $app->get('/', function() use ($app) {
          return $app['twig']->render('home.html.twig', array('cd' => CD::getAll()));
      });

      $app->get('/create_cd', function() use ($app) {
          return $app['twig']->render('create_cd.html.twig', array('cd' => CD::getAll()));
      });

      $app->post('/library', function() use ($app) {
          $new_cd = new CD($_POST['artist'], $_POST['album']);
          $new_cd->save();
          return $app['twig']->render('library.html.twig', array('library_cd' => $new_cd));
      });

      $app->post('/search', function() use($app){
        $results = array();
        $searched_artist = ($_POST['search']);
          foreach($_SESSION['list_of_cds'] as $cd){
            if($cd->getArtist() == $searched_artist){
              array_push($results, $cd);
            }
          }
        return $app['twig']->render('search_result.html.twig', array('artist_list' => $results));
      });

      $app->post('/delete', function() use ($app) {
          CD::deleteAll();
          return $app['twig']->render('delete_cd.html.twig');
      });

      return $app;
 ?>
