<?php

  class CD
  {
      private $artist;
      private $album;
      // private $search;

    function __construct($cd_artist, $cd_album)
    {
      $this->artist = $cd_artist;
      $this->album = $cd_album;
      // $this->search = $cd_search;
    }
    function setArtist($new_artist)
    {
      $this->artist = $new_artist;
    }
    function setAlbum($new_album)
    {
      $this->album = $new_album;
    }
    function getArtist()
    {
      return $this->artist;
    }
    function getAlbum()
    {
      return $this->album;
    }
    function save()
    {
      array_push($_SESSION['list_of_cds'], $this);
    }
    static function getAll()
    {
    return $_SESSION['list_of_cds'];
    }
    static function deleteAll()
    {
      $_SESSION['list_of_cds'] = array();
    }
    // function setSearch($new_search)
    // {
    //   $this->search = $new_search;
    // }
    // function getSearch()
    // {
    //   return $this->search;
    // }

  }

?>
