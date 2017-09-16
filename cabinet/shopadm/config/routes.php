<?php
return array(

    'shopadm/profile' => 'shopadm/profile',
    'shopadm/save-profile' => 'shopadm/saveProfile',
    'shopadm/create-profile' =>'shopadm/createProfile',

    'shopadm/add-seeds' => 'material/addSeeds',
    'shopadm/create-seeds' => 'material/createSeeds',
    'shopadm/edit-seeds/([0-9]+)' => 'material/editSeeds/$1',
    'shopadm/save-seeds' => 'material/saveSeeds',

    'shopadm/add-ppa' => 'material/addPpa',
    'shopadm/create-ppa' => 'material/createPpa',
    'shopadm/list-ppa' => 'material/listPpa',
    'shopadm/edit-ppa' => 'material/editPpa',
    'shopadm/save-ppa' => 'material/savePpa',


    'shopadm/add-fertilizers' => 'material/addFertilizers',
    'shopadm/create-fertilizers' => 'material/createFertilizers',
    'shopadm/list-fertilizers' => 'material/listFertilizers',
    'shopadm/edit-fertilizers/([0-9]+)' => 'material/editFertilizers/$1',
    'shopadm/save-fertilizers' => 'material/saveFertilizers',


    'shopadm/remove-material/([a-z]+)/([0-9]+)' => 'material/removeMaterial/$1/$2',

    'shopadm' => 'material/listSeeds',
);