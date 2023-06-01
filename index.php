<?php

$url=parse_url($_SERVER['REQUEST_URI']);

if(substr($url['path'], -1) === '/') {
  $url['path'] .= 'index.html';
}

$ext = pathinfo($url['path'], PATHINFO_EXTENSION);


if(file_exists("/files" . $url['path'])){

  $content_type = mime_content_type("/files" . $url['path']);

  header("Content-Type: " . $content_type);
  // this will execute PHP that is embedded. This should be an option for users via a configuration file.
  include("/files" . $url['path']);

}
else {
  header("HTTP/1.0 404 Not Found");
  include("404.html");
}
