<?php

$url=parse_url($_SERVER['REQUEST_URI']);

if(substr($url['path'], -1) === '/') {
  $url['path'] .= 'index.html';
}

$ext = pathinfo($url['path'], PATHINFO_EXTENSION);


if(file_exists("/files" . $url['path'])){

  $content_type = mime_content_type("/files" . $url['path']);

  $type_overrides = [
    'css' => 'text/css',
    'js' => 'application/javascript',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'swf' => 'application/x-shockwave-flash',
    'flv' => 'video/x-flv',
    'svg' => 'image/svg+xml'
  ];
  if(isset($type_overrides[$ext])) {
    $content_type = $type_overrides[$ext];
  }
  header("Content-Type: " . $content_type);
  // this will execute PHP that is embedded. This should be an option for users via a configuration file.
  // include("/files" . $url['path']);
   print(file_get_contents("/files" . $url['path']));

}
else {
  header("HTTP/1.0 404 Not Found");
  include("404.html");
}
