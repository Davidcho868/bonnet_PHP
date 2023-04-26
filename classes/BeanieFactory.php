<?php

class BeanieFactory {

    public function create(array $tabBonnet): Beanie {
        $beanie = new Beanie();
        $beanie->setId($tabBonnet['id_beanie']);
        $beanie->setName($tabBonnet['name']);
        $beanie->setPrice($tabBonnet['price']);
        $beanie->setDescription($tabBonnet['description']);
        $beanie->setImage($tabBonnet['image']);
        if (is_string($tabBonnet['sizes'])) {
            $tabBonnet['sizes'] = json_decode($tabBonnet['sizes']);
        }
        $beanie->setSizes($tabBonnet['sizes']);
        if (is_string($tabBonnet['materials'])) {
            $tabBonnet['materials'] = json_decode($tabBonnet['materials'], true, 512, JSON_OBJECT_AS_ARRAY);
        }
        $beanie->setMaterials($tabBonnet['materials']);

        return $beanie;
    }



}


?>