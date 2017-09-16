<?php
return array(

    'farmer/profile/save' => 'users/saveProfile',
    'farmer/profile' => 'users/profile',


    'farmer/add-crop-list'=>'business/addCropList',

    'farmer/price-revenue'=>'bdView/getPriceRevenue',

    'farmer/export_form'=>'form/exportForm',
    'farmer/save_export_form'=>'form/saveExportForm',
    'farmer/form/([0-9]+)' => 'form/getForm1/$1',
    'farmer/form_m/([0-9]+)' => 'form/getForm1m/$1',
    'farmer/save-form/([0-9]+)' => 'form/saveForm/$1',
    'farmer/save-form_m/([0-9]+)' => 'form/saveFormm/$1',
    'farmer/form50/([0-9]+)' => 'form/getForm50/$1',
    'farmer/save-form50' => 'form/saveForm50',

    'farmer/edit-lease'=>'business/editLease',
    'farmer/edit-save-crop-list'=>'business/saveCropList',
    'farmer/add-list-crop'=>'business/addMyListCrop',

    'farmer/fact'=>'fact/getFact',
    'farmer/revenues-fact'=>'fact/getFactRevenues',
    'farmer/save-field'=>'fact/saveField',

    'farmer/budget-month'=>'budget/getBudgetMonth',
    'farmer/budget-cash-flow'=>'budget/getBudgetCashFlow',
    'farmer/budget/setting-month'=>'budget/getSettingMonth',
    'farmer/budget/save-setting-month'=>'budget/saveSettingMonth',
    'farmer/budget/save-cash-flow'=>'budget/saveCashFlow',

    'farmer/budget/financial/off'=>'budget/getFinancialIndicators/$1',
    'farmer/budget/graphs'=>'budget/getGraphs',
    'farmer/budget/setting-cash'=>'budget/getSettingCash',
    'farmer/budget/setting-material'=>'budget/getSettingMaterial',
    'farmer/budget/save-setting-material'=>'budget/saveSettingMaterial',
    'farmer/budget/balance-products'=>'setting/getBalanceProducts',
    'farmer/budget/save-setting-balance'=>'setting/saveBalanceProducts',
    'farmer/budget/setting-sales'=>'setting/getSettingSales',
    'farmer/budget/financial-bank'=>'setting/getSettingFinancialBank',
    'farmer/budget/save-financial-bank'=>'setting/saveSettingFinancialBank',
    'farmer/budget/save-setting-sales'=>'setting/saveSettingSales',

    'farmer/budget/financial'=>'budget/getFinancialIndicators',

    'farmer/analysis/solvency'=>'analysis/getSolvency',

    'farmer/budget/remains-revenue/([0-9]+)/([0-9]+)'=>'budget/getRemainsRevenue/$1/$2',
    'farmer/budget/remains-fuel/([0-9]+)/([0-9]+)'=>'budget/getRemainsFuel/$1/$2',
    'farmer/budget/remains-labor/([0-9]+)/([0-9]+)'=>'budget/getRemainsLabor/$1/$2',
    'farmer/budget/remains-direct/([0-9]+)/([0-9]+)'=>'budget/getRemainsDirect/$1/$2',
    'farmer/budget/remains-services/([0-9]+)/([0-9]+)'=>'budget/getRemainsServices/$1/$2',
    'farmer/budget/remains-material/([0-3]+)/([0-9]+)/([0-9]+)'=>'budget/getRemainsMaterial/$1/$2/$3',
    'farmer/budget/remains-total-material/([0-9]+)/([0-9]+)'=>'budget/getRemainsTotalMaterial/$1/$2',
    'farmer/budget/remains-plan/([0-9]+)/([0-9]+)'=>'budget/getPlan/$1/$2',

    'farmer/budget'=>'budget/getBudget',

    'farmer/store-add-basket'=>'store/addBasket',
    'farmer/store-plan'=>'store/getPlanMaterial',
    'farmer/store-list'=>'store/getListMaterial',

    'farmer/create/crop-plan/([0-9]+)'=>'constructor/getCropPlan/$1',
    'farmer/create/crop'=>'constructor/getCrop',
    'farmer/create/add-crop'=>'constructor/addCrop',
    'farmer/create/remove-crop/([0-9]+)'=>'constructor/removeCrop/$1',
    'farmer/create/edit-crop/([0-9]+)'=>'constructor/editCrop/$1',
    'farmer/create/edit-action/([0-9]+)'=>'constructor/editAction/$1',
    'farmer/create/create-crop'=>'constructor/createCrop',
    'farmer/create/save-crop/([0-9]+)'=>'constructor/saveCrop/$1',
    'farmer/create/create-action'=>'constructor/createAction',
    'farmer/create/create-material'=>'constructor/createMaterial',
    'farmer/create/create-plan'=>'constructor/createPlan',
    'farmer/create/remove-plan'=>'constructor/removePlan',
    'farmer/create/parent-plan'=>'constructor/parentPlan',
    'farmer/create/materials'=>'constructorEdit/getMaterials',
    'farmer/create/save-edit-plan/([0-9]+)/([0-9]+)'=>'constructorEdit/getEditPlan/$1/$2',
    'farmer/create/save-edit-material'=>'constructorEdit/saveEditMaterial',
    'farmer/create/save-edit-action'=>'constructorEdit/saveEditAction',
    'farmer/create/save-edit-plan'=>'constructorEdit/saveEditPlan',


    'farmer' => 'business/addPlan',
);