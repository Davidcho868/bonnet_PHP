<?php
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

$defaultPassword = "toto";
?>