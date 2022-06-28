<?php declare(strict_types=1);

class Product {
    private string $title = 'sans titre';
    private string $shortDescription = 'sans description courte';
    private string $longDescription = 'sans description longue';
    private float $price = 0.0;
    private int $quantity = 0;
    private bool $isAvailable = false;
    private string $mark = 'sans marque';
    private string $image = 'img/product_item/product_one.png';
    private string $category = 'sans categorie';
    private float $note = 0.0;
    private int $nbNote = 0;

    // Methode pour le titre
        // Setter
            public function setTitle(string $title): void {
                $this->title = $title;
            }
        // Getter
            public function getTitle(): string {
                return $this->title;
            }
    
    // Methode pour la courte description
        // Setter
            public function setShortDescription(string $shortDescription): void {
                if (self::validateShortDescription($shortDescription)) {
                    $this->shortDescription = $shortDescription;
                }
            }
        // Getter
            public function getShortDescription(): string {
                return $this->shortDescription;
            }
        // Methode
            public static function validateShortDescription(string $shortDescription): bool {
                $longDescription = strlen($shortDescription);
                if ( $longDescription < 60 &&  $longDescription > 0) {
                    return true;
                }
                return false;
            }
    
    // Methode pour la longue description
        // Setter
            public function setLongDescription(string $longDescription): void {
                if (self::validateLongDescription($longDescription)) {
                    $this->longDescription = $longDescription;
                }
            }
        // Getter
            public function getLongDescription(): string {
                return $this->longDescription;
            }

        // Methode
            public static function validateLongDescription(string $longDescription): bool {
                $longDescription = strlen($longDescription);
                if ( $longDescription < 200 &&  $longDescription > 0) {
                    return true;
                }
                return false;
            }

    
    // Methode pour le prix
        // Setter
            public function setPrice(float $price): void {
                if (self::validatePrice($price)) {
                    $this->price = $price;
                } else {
                    $this->price = 0.0;
                }
            }
        // Getter
            public function getPrice(): float {
                return $this->price;
            }

        // Methode
            public static function validatePrice(float $price): bool {
                if ($price > 0) {
                    return true;
                }
                return false;
            }
    
    // Methode pour la quantité
        // Setter
            public function setQuantity(int $quantity): void {
                if (self::validateQuantity($quantity)) {
                    $this->quantity = $quantity;
                } else {
                    $this->quantity = 0;
                }
            }
        // Getter
            public function getQuantity(): int {
                return $this->quantity;
            }
        // Methode
            public static function validateQuantity(int $quantity): bool {
                if ($quantity > 0) {
                    return true;
                }
                return false;
            }
    
    // Methode pour is available
        // Setter
            public function setIsAvailable(bool $isAvailable): void {
                $this->isAvailable = $isAvailable;
            }
        // Getter
            public function getIsAvailable(): bool {
                return $this->isAvailable ? 'disponible' : 'indisponible';
            }
    
    // Methode pour les marques
        // Setter
            public function setMark(string $mark): void {
                $this->mark = $mark;
            }
        // Getter
            public function getMark(): string {
                return $this->mark;
            }
    
    // Methode pour l'image
        // Setter
            public function setImage(string $image): void {
                $this->image = $image;
            }
        // Getter
            public function getImage(): string {
                return $this->image;
            }
    
    // Methode pour les catégories
        // Setter
            public function setCategory(string $category): void {
                $this->category = $category;
            }
        // Getter
            public function getCategory(): string {
                return $this->category;
            }

    // Methode pour la notes
        // Setter
            public function setNote(float $note): void {
                if (self::validateNote($note)) {
                    $this->note = $note;
                } else {
                    $this->note = 0.0;
                }
            }
        // Getter
            public function getNote(): float {
                return $this->note;
            }

        // Methode
            public static function validateNote(float $note): bool {
                if ($note > 0 && $note <= 5) {
                    return true;
                }
                return false;
            }
    // Methode pour le nombre de  notes
        // Setter
            public function setNbNote(int $nbNote): void {
                if (self::validateNbNote($nbNote)) {
                    $this->nbNote = $nbNote;
                } else {
                    $this->nbNote = 0;
                }
            }
        // Getter
            public function getNbNote(): int {
                return $this->nbNote;
            }

        // Methode
            public static function validateNbNote(int $nbNote): bool {
                if ($nbNote > 0) {
                    return true;
                }
                return false;
            }

    // Constructeur de class
        public function __construct(string $title, string $shortDescription, string $longDescription, float $price, int $quantity, bool $isAvailable, string $mark, string $image, string $category, float $note, int $nbNote) {
            $this->setTitle($title);
            $this->setShortDescription($shortDescription);
            $this->setLongDescription($longDescription);
            $this->setPrice($price);
            $this->setQuantity($quantity);
            $this->setIsAvailable($isAvailable);
            $this->setMark($mark);
            $this->setImage($image);
            $this->setCategory($category);
            $this->setNote($note);
            $this->setNbNote($nbNote);
        }
}

$products = [
    new Product('Cage pour petits animaux Gonzales', 'shortDescription', 'longDescription', 59.99, 10, true, 'Gonzales', 'img/product_item/product_one.png', 'Rongeur', 3.5, 10),
    new Product('Lucky Reptile Bright Sun UV', 'shortDescription', 'longDescription', 34.49, 10, true, 'Lucky Reptile', 'img/product_item/product_two.png', 'Terrariophilie', 4.5, 9),
    new Product('Litière minérale pour chat', 'shortDescription', 'longDescription', 19.99, 10, true, 'Sanitole', 'img/product_item/product_three.png', 'Chat', 2.5, 13),
    new Product('Arbre à chat Minou Minette XL', 'shortDescription', 'longDescription', 179.99, 26, true, 'Minou Minette', 'img/product_item/product_four.png', 'Chat', 4, 10),
    new Product('MultiFit Pâtée aux oeufs 1kg', 'shortDescription', 'longDescription', 7.99, 26, true, 'MultiFit', 'img/product_item/product_five.png', 'Oiseaux', 4.5, 53),
    new Product('Trixie jouet pour chien', 'shortDescription', 'longDescription', 12.50, 10, true, 'Trixie', 'img/product_item/product_six.png', 'Chien', 3, 10),
    new Product('Balle en mousse caoutchouc', 'shortDescription', 'longDescription', 5.99, 10, true, 'Proplan', 'img/product_item/product_seven.png', 'Terrariophilie', 5, 34),
    new Product('Royal Canin Croquettes chiots', 'shortDescription', 'longDescription', 55.90, 10, true, 'Royal Canin', 'img/product_item/product_height.png', 'Chien', 2, 13),

];