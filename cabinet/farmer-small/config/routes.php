<?php

return array(
    'farmer-small/content'=>'create/content',   
    'farmer-small/budget/revenue/([0-9]+)'=>'budget/remainsRevenue/$1',
    'farmer-small/budget/services/([0-9]+)'=>'budget/remainsServices/$1',
    'farmer-small/budget/wedding/([0-9]+)'=>'budget/remainsWedding/$1',
    'farmer-small/budget/materials/([0-9]+)/([0-9]+)'=>'budget/remainsMaterial/$1/$2',

    'farmer-small/budget-crop/([0-9]+)'=>'budget/budgetCropCrop/$1',
    'farmer-small/budget-crop'=>'budget/budgetCrop',

    'farmer-small/budget-month'=>'budget/budgetMonth',
    'farmer-small/budget-cash-flow'=>'budget/budgetCashFlow',
    'farmer-small/budget-financial'=>'budget/financial',
    'farmer-small/budget-graphs'=>'budget/graphs',
    'farmer-small/budget-fact-graphs'=>'budget/graphsFact',

    'farmer-small/save-my-crop' =>'create/addCrop',
    'farmer-small/save-my-equip' =>'create/addEquipment',
    'farmer-small/save-crop' => 'create/saveCrop',
    'farmer-small/save-edit-crop' => 'edit/saveCropRevenue',
    'farmer-small/save-action' => 'action/saveAction',
    'farmer-small/save-equipment'=>'action/saveEquipment',
    'farmer-small/save-edit-plan' =>'plan/saveEditPlan',
    'farmer-small/edit-crop-area' =>'edit/saveEditCropArea',
    'farmer-small/edit-crop-yaled' =>'edit/saveEditCropYaled',
    'farmer-small/save-tech-cart' =>'edit/saveTech',
    'farmer-small/save-rent-price'=>'plan/saveRent',
    'farmer-small/save-translate'=>'create/saveTranslate',
    'farmer-small/save-field'=>'create/saveField',
    'farmer-small/save_new_field'=>'plan/saveAnalytica',

    'farmer-small/edit-fact-list'=>'fact/editFact',
    'farmer-small/edit-fact-revenues'=>'fact/editFactRevenues',

    'farmer-small/list-forecast/([0-9]+)'=>'plan/listForecast/$1',
    'farmer-small/list-forecast'=>'plan/listForecast/0',

    'farmer-small/edit-plan/([0-9]+)/([0-9]+)' => 'plan/editPlan/$1/$2',
    'farmer-small/edit-crop/([0-9]+)' => 'edit/editCropSetting/$1',
    'farmer-small/add-crop'=>'create/addCulture',
    'farmer-small/list-plan/([0-9]+)' => 'plan/listPlan/$1',
    'farmer-small/remove-equipment/([0-9]+)' => 'plan/removeDepreciation/$1',
    'farmer-small/remove-crop/([0-9]+)' => 'plan/removeCrop/$1',
    'farmer-small/add-equipment' => 'create/listEquipment',
    'farmer-small/add-something'=>'edit/addSome',
    'farmer-small/material-base'=>'plan/materialBase',
    'farmer-small/tech-cart' => 'plan/techCart',

    'farmer-small/crop-fact' => 'fact/budgetFactCrop',
    'farmer-small/month-fact' => 'fact/budgetFactMonth',
    'farmer-small/revenus-fact'=>'fact/getFactRevenues',
    'farmer-small/other-fact'=>'fact/getFactOther',
    'farmer-small/save-revenues-fact'=>'fact/saveFactRevenues',
    'farmer-small/save-fact' => 'fact/saveFact',
    'farmer-small/fact' => 'fact/getFact',
    'farmer-small/remains-fact/([a-zA-Z._]+)/([0-9]+)'=>'fact/remainFact/$1/$2',


    'farmer-small/crops'=>'plan/crops',
    'farmer-small' => 'plan/crops',
);