<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;
class AppFixtures extends Fixture
{

    public function __construct(  private readonly UserPasswordHasherInterface  $hasher)
    {
       
    }
    public function load(ObjectManager $manager): void
    {      $user= new User();
        $user->setEmail('anabelle0025@yahoo.fr')
             ->setRoles(["ROLE_ADMIN"])
             ->setPassword($this->hasher->hashPassword($user,'1234'))
             ->setNom('Hamiche')
             ->setPrenom('Nadia')
            //  ->setDateCreationValue(new \DateTimeImmutable())
             ->setAdresse('1 Avenue Henri Romain Boyer')
             ->setVille('Marseille')
             ->setCp('13015')
             ->setIsVerified('1');
            //  ->setDatemodificationValue(new \DateTimeImmutable());
        $manager->persist($user);

        $user= new User();
        $user->setEmail('yazmiche@yahoo.fr')
             ->setRoles(["ROLE_USER"])
             ->setPassword($this->hasher->hashPassword($user,'1234567'))
             ->setNom('Hamiche')
             ->setPrenom('Amar')
            //  ->setDateCreationValue(new \DateTimeImmutable())
             ->setAdresse('1 Avenue Henri Romain Boyer')
             ->setVille('Marseille')
             ->setCp('13015')
             ->setIsVerified('1');
            //  ->setDatemodificationValue(new \DateTimeImmutable());
        $manager->persist($user);


        $faker = Faker\Factory::create('fr_FR');
        $faker->addProvider(new class($faker) extends \Faker\Provider\Base {
            public function verified()
            {      
        // Générer aléatoirement true ou fals      
            return $this->randomElement([true, false]);
            }
            });
        $user = Array();
        for ($i=0; $i <= 20; $i++) {
     
            $user[$i] = new User();
            $user[$i]->setEmail($faker->email);
            // $user[$i]->setRoles($faker->ROLE_USER);
            $password = $faker->password;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user[$i]->setPassword($hashedPassword);
                        // $user[$i]->setPassword($faker->password);
            $user[$i]->setNom($faker->firstName);
            $user[$i]->setPrenom($faker->lastName);
            $user[$i]->setAdresse($faker->address);
            $user[$i]->setVille($faker->city);
            $user[$i]->setCp($faker->postCode);
            $user[$i]->setIsVerified($faker->verified);

            $manager->persist($user[$i]);
       

        $manager->flush();
    }
}
}