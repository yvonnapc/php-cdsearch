<?php

  class CD
  {
    private $artist;
    private $album;

  function __construct($cd_artist, $cd_album)
  {
    $this->artist = $cd_artist;
    $this->album = $cd_album;
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

}

?>
