<?php

function dimunier($phrase, $taille)
{
  if (strlen($phrase) > $taille) {
    $phrase = substr($phrase, 0, $taille);
    $vide = strrpos($phrase, " ");
    $phrase = substr($phrase, 0, $vide);
    $phrase = $phrase . "...";
  }
  return $phrase;
}
