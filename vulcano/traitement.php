<?php

$donnees=json_decode('
[{
    "id": 1,
    "titre": "L’Ile de Lombok vue depuis l’île de Trawangan (Iles Gili)",
    "alt": "L’Ile de Lombok vue depuis l’île de Trawangan (Iles Gili) Volcan-Indonesie"
}, {
    "id": 2,
    "titre": "Le volcan Agung, Bali.",
    "alt": "Le volcan Agung, Bali. Volcan-Bali"
}, {
    "id": 3,
    "titre": "Construction d’une embarcation traditionnelle, Lovina Beach, Bali.",
    "alt": "Construction d’une embarcation traditionnelle, Lovina Beach, Bali. Volcan-Lovina-Beach"
}, {
    "id": 4,
    "titre": "Pêcheur artisanal sur la côte balinaise",
    "alt": "Pêcheur artisanal sur la côte balinaise"
}, {
    "id": 5,
    "titre": "Coucher de soleil sur la Mer de Bali",
    "alt": "Coucher de soleil sur la Mer de Bali"
}, {
    "id": 6,
    "titre": "Echange spirituel au temple hindou « Pura Ulun Danu », Bali.",
    "alt": "Echange spirituel au temple hindou « Pura Ulun Danu », Bali."
}, {
    "id": 7,
    "titre": "Scène de vie quotidienne (nourriture destinée aux cochons), Lovina Beach, Bali.",
    "alt": "Scène de vie quotidienne (nourriture destinée aux cochons), Lovina Beach, Bali."
}, {
    "id": 8,
    "titre": "Epouillage en règle à la forêt des singes d’Ubud ; cet animal est sacré pour les Balinais.",
    "alt": "Epouillage en règle à la forêt des singes d’Ubud ; cet animal est sacré pour les Balinais."
}, {
    "id": 9,
    "titre": " Forêt des singes d’ Ubud, Bali.",
    "alt": " Forêt des singes d’ Ubud, Bali."
}, {
    "id": 10,
    "titre": "Forêt des singes d’ Ubud, Bali.",
    "alt": "Forêt des singes d’ Ubud, Bali."
}, {
    "id": 11,
    "titre": "Arbre de la forêt des singes d’ Ubud.Il s’ agit de racines et non de lianes.",
    "alt": "Arbre de la forêt des singes d’ Ubud.Il s’ agit de racines et non de lianes."
}, {
    "id": 12,
    "titre": "Crépuscule au temple hindou de Luhur Uluwatu, Bali.",
    "alt": "Crépuscule au temple hindou de Luhur Uluwatu, Bali."
}, {
    "id": 13,
    "titre": "Nénuphars du jardin aquatique de Tirta Gangga, Bali.",
    "alt": "Nénuphars du jardin aquatique de Tirta Gangga, Bali."
}, {
    "id": 14,
    "titre": "Coq dans une cage en bambou.Les combats de coqs sont interdits en dehors de l’ enceinte des temples, mais les Balinais en sont friands et en organisent clandestinement.",
    "alt": "Coq dans une cage en bambou.Les combats de coqs sont interdits en dehors de l’ enceinte des temples, mais les Balinais en sont friands et en organisent clandestinement."
}, {
    "id": 15,
    "titre": "Rizières de Jatiluwih, Bali.",
    "alt": "Rizières de Jatiluwih, Bali."
}, {
    "id": 16,
    "titre": "Cratère du volcan Bromo, vénéré par les Javanais hindous.Haut - lieu de pèlerinage et d’ offrandes, un temple est édifié à ses pieds.Ile de Java.",
    "alt": "Cratère du volcan Bromo, vénéré par les Javanais hindous.Haut - lieu de pèlerinage et d’ offrandes, un temple est édifié à ses pieds.Ile de Java."
}, {
    "id": 17,
    "titre": "Massif du Tengger, très fertile en raison des dépôts volcaniques.Les cultures se situent en bordure de la caldeira du Bromo.Une caldeira est une immense dépression formée consécutivement à l’ effondrement de la chambre magmatique du volcan.Ile de Java.",
    "alt": "Massif du Tengger, très fertile en raison des dépôts volcaniques.Les cultures se situent en bordure de la caldeira du Bromo.Une caldeira est une immense dépression formée consécutivement à l’ effondrement de la chambre magmatique du volcan.Ile de Java."
}, {
    "id": 18,
    "titre": "Le Mont Bromo et sa caldeira, avec, en arrière - plan, le Semeru, qui« explose» toutes les 30 mn environ et qui culmine à 3 676 m, en faisant le point culminant de l’ île de Java.",
    "alt": "Le Mont Bromo et sa caldeira, avec, en arrière - plan, le Semeru, qui« explose» toutes les 30 mn environ et qui culmine à 3 676 m, en faisant le point culminant de l’ île de Java."
}, {
    "id": 19,
    "titre": "Lac de cratère du volcan Batur, Bali.",
    "alt": "Lac de cratère du volcan Batur, Bali."
}, {
    "id": 20,
    "titre": "Cratère du Kawah Ijen et son lac acide, sans doute le plus acide au monde;extrême ouest de Java.",
    "alt": "Cratère du Kawah Ijen et son lac acide, sans doute le plus acide au monde;extrême ouest de Java."
}, {
    "id": 21,
    "titre": "Vapeur d’ eau émanant du cratère du volcan Bromo.On remarque des dépôts soufrés sur ses parois.",
    "alt": "Vapeur d’ eau émanant du cratère du volcan Bromo.On remarque des dépôts soufrés sur ses parois."
}, {
    "id": 22,
    "titre": "Idem.",
    "alt": "Idem."
}, {
    "id": 23,
    "titre": "Affleurement lors de l’ ascension du Kawah Ijen, à l’ extrême ouest de Java.",
    "alt": "Affleurement lors de l’ ascension du Kawah Ijen, à l’ extrême ouest de Java."
}, {
    "id": 24,
    "titre": "Chargement de plaques de soufre extraites du cratère du Kawah Ijen, à l’ extrême ouest de Java.La production est remontée à dos d’ hommes, sans équipement particulier et peut peser jusqu’ à 80 kg.",
    "alt": "Chargement de plaques de soufre extraites du cratère du Kawah Ijen, à l’ extrême ouest de Java.La production est remontée à dos d’ hommes, sans équipement particulier et peut peser jusqu’ à 80 kg."
}]
');
if (isset($_GET["min"])) {
    //si on rec le num de image -1 
    $min=intval($_GET["min"])-1;
}
else{
    $min=0;
}
if (isset($_GET["max"])) {
    $max=intval($_GET["max"]);
} else {
    $max=24;
}
$length=$max-$min;

echo json_encode(array_slice($donnees,$min,$length));
?>