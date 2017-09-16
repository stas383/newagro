<?php
return array(

    'distributor/profile' => 'distributor/profile',
    'distributor/save-profile' => 'distributor/saveProfile',
    'distributor/create-profile' =>'distributor/createProfile',

    'distributor/add-seeds' => 'material/addSeeds',
    'distributor/create-seeds' => 'material/createSeeds',
    'distributor/edit-seeds/([0-9]+)' => 'material/editSeeds/$1',
    'distributor/save-seeds' => 'material/saveSeeds',

    'distributor/add-ppa' => 'material/addPpa',
    'distributor/create-ppa' => 'material/createPpa',
    'distributor/list-ppa' => 'material/listPpa',
    'distributor/edit-ppa' => 'material/editPpa',
    'distributor/save-ppa' => 'material/savePpa',


    'distributor/add-fertilizers' => 'material/addFertilizers',
    'distributor/create-fertilizers' => 'material/createFertilizers',
    'distributor/list-fertilizers' => 'material/listFertilizers',
    'distributor/edit-fertilizers/([0-9]+)' => 'material/editFertilizers/$1',
    'distributor/save-fertilizers' => 'material/saveFertilizers',


    'distributor/remove-material/([a-z]+)/([0-9]+)' => 'material/removeMaterial/$1/$2',

    'distributor' => 'material/listSeeds',
);
