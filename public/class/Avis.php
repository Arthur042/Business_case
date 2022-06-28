<?php declare(strict_types=1);

class Avis {
    // Constructor de la clase Avis --------------------------------------------------------------------------------------------------
        public function __construct(
            private string $name,
            private string $description,
            private string $image,
            ) {
            $this->setName($name);
            $this->setDescription($description);
            $this->setImage($image);
        }
        
    // Methode du nom de l'avis ----------------------------------------------------------------------------------------------------
        // Getter
            public function getName(): string {
                return $this->name;
            }
        // Setter
            public function setName(string $name): void {
                $this->name = $name;
            }

    // Methode de la description ----------------------------------------------------------------------------------------------------
        // Getter
            public function getDescription(): string {
                return $this->description;
            }
        // Setter
            public function setDescription(string $description): void {
                $this->description = $description;
            }

    // Methode de l'image -------------------------------------------------------------------------------------------------------------
        // Getter
            public function getImage(): string {
                return $this->image;
            }
        // Setter
            public function setImage(string $image): void {
                $this->image = $image;
            }
}

// Création de faux avis
    $avis = [
        new Avis('NINO', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt expedita vel eveniet molestias.', 'cat.png'),
        new Avis('LAIKA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt expedita vel eveniet molestias.', 'dog.png'),
        new Avis('FOXY', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt expedita vel eveniet molestias.', 'fox.png'),
        new Avis('SAURUS', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt expedita vel eveniet molestias.', 'lezard.png'),
        new Avis('FRANKLIN', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt expedita vel eveniet molestias.', 'turtle.png'),
    ];

?>