<?php

namespace App\Entity;

class RechercheVoiture
{
  private $minAnnee;
  private $maxAnnee;


  public function getMinAnnee()
  {
    return $this->minAnnee;
  }
  public function getMaxAnnee()
  {
    return $this->maxAnnee;
  }

  public function setMinAnnee(int $annee)
  {
    $this->minAnnee = $annee;
    return $this;
  }
  public function setMaxAnnee(int $annee)
  {
    $this->maxAnnee = $annee;
    return $this;
  }
}
