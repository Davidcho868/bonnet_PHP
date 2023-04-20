<?php
spl_autoload_register(function($class) {
    require_once "../classes/$class.php";
});
require_once '../includes/config.inc.php';

$tabBonnet = [
    (new Beanie())
    ->setId(0)
    ->setName("Bonnet en laine")
    ->setPrice(10.0)
    ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.")
    ->setImage("img/bonnet_creme.jpg")
    ->addMaterial(Beanie::MATERIAL_WOOL)
    ->addSize('S')
    ->addSize('M')
    ->addSize('L')
    ->addSize('XL'),
    (new Beanie())
    ->setId(1)
    ->setName("Bonnet en laine bio")
    ->setPrice(14.0)
    ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.")
    ->setImage("img/bonnet_rouge.jpg")
    ->addMaterial(Beanie::MATERIAL_WOOL)
    ->addMaterial(Beanie::MATERIAL_COTTON)
    ->addSize('M')
    ->addSize('XL'),
    (new Beanie())
    ->setId(2)
    ->setName("Bonnet en laine et cachemire")
    ->setPrice(20.0)
    ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.")
    ->setImage("img/bonnet_teal.jpg")
    ->addMaterial(Beanie::MATERIAL_WOOL)
    ->addMaterial(Beanie::MATERIAL_CASHMERE)
    ->addSize('S')
    ->addSize('M')
    ->addSize('L')
    ->addSize('XL'),
    (new Beanie())
    ->setId(3)
    ->setName("Bonnet arc-en-ciel")
    ->setPrice(12.0)
    ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.")
    ->setImage("img/bonnet_vert.jpg")
    ->addMaterial(Beanie::MATERIAL_SILK)
    ->addSize('L')
    ->addSize('XL'),


];


$sql = 'INSERT INTO beanies 
(name,
description,
price,
image,
sizes,
materials) VALUES 
(:name,
:description,
:price,
:image,
:sizes,
:materials)';

$statement = $db->prepare($sql);

$name = null;
$description = null;
$price = null;
$image = null;
$sizes = null;
$materials = null;
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':description', $description, PDO::PARAM_STR);
$statement->bindParam(':price', $price, PDO::PARAM_INT);
$statement->bindParam(':image', $image, PDO::PARAM_STR);
$statement->bindParam(':sizes', $sizes, PDO::PARAM_STR);
$statement->bindParam(':materials', $materials, PDO::PARAM_STR);

foreach ($tabBonnet as $beanie) {
    $name = $beanie->getName();
    $description = $beanie->getDescription();
    $price = $beanie->getPrice();
    $image = $beanie->getImage();
    $sizes = json_encode($beanie->getSizes());
    $materials = json_encode($beanie->getMaterials());

    $statement->execute();
}





?>