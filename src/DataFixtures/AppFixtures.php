<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $marque1 = new Marque();
    $marque1->setLibelle("Toyota");
    $manager->persist($marque1);

    $marque2 = new Marque();
    $marque2->setLibelle("Peugot");
    $manager->persist($marque2);

    $marque3 = new Marque();
    $marque3->setLibelle("Audi");
    $manager->persist($marque3);


    $model1 = new Modele();
    $model1->setLibelle("Yaris")
      ->setImage("yaris.jpeg")
      ->setPrixMoyen(15000)
      ->setMarque($marque1);
    $manager->persist($model1);

    $model2 = new Modele();
    $model2->setLibelle("3008")
      ->setImage("3008.jpeg")
      ->setPrixMoyen(25000)
      ->setMarque($marque1);
    $manager->persist($model2);

    $model3 = new Modele();
    $model3->setLibelle("RS6")
      ->setImage("rs6.jpeg")
      ->setPrixMoyen(45000)
      ->setMarque($marque1);
    $manager->persist($model3);

    $model4 = new Modele();
    $model4->setLibelle("208")
      ->setImage("208.jpeg")
      ->setPrixMoyen(45000)
      ->setMarque($marque2);
    $manager->persist($model4);

    $model5 = new Modele();
    $model5->setLibelle("Lexus LC")
      ->setImage("lc.jpeg")
      ->setPrixMoyen(45000)
      ->setMarque($marque1);
    $manager->persist($model5);

    $model6 = new Modele();
    $model6->setLibelle("Audi Q7")
      ->setImage("q7.jpeg")
      ->setPrixMoyen(45000)
      ->setMarque($marque3);
    $manager->persist($model6);
    $modeles = [$model1, $model2, $model3, $model4, $model5, $model6];

    $faker = Faker\Factory::create('fr_FR');

    foreach ($modeles as $m) {
      $rand = rand(3,5);
      for ($i=1; $i <= $rand; $i++) { 
        $voiture = new Voiture();
        $voiture->setImmatriculation($faker->regexify("[A-Z]{2}[0-9]{3,4}[A-Z]{2}"))
        ->setNbPortes($faker->randomElement($array = array(3,5)))
        ->setAnnee($faker->numberBetween($min=1990,$max=2022))
        ->setModele($m);
        $manager->persist($voiture);
      }
    }

    $manager->flush();
  }
}
