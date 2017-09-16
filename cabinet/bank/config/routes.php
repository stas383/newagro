<?php
return array(

    'bank/profile/save' => 'users/saveProfile',
    'bank/profile' => 'users/profile',

    'bank/form/([0-9]+)' => 'form/getForm1/$1',
    'bank/form_m/([0-9]+)' => 'form/getForm1m/$1',
    'bank/save-form/([0-9]+)' => 'form/saveForm/$1',
    'bank/form50/([0-9]+)' => 'form/getForm50/$1',
    'bank/save-form50' => 'form/saveForm50',

    'bank/edit-save-crop-list'=>'business/saveCropList',
    'bank/add-list-crop'=>'business/addMyListCrop',

    'bank/budget-month'=>'budget/getBudgetMonth',
    'bank/budget-cash-flow'=>'budget/getBudgetCashFlow',
    'bank/budget/setting-month'=>'budget/getSettingMonth',
    'bank/budget/save-setting-month'=>'budget/saveSettingMonth',
    'bank/budget/save-cash-flow'=>'budget/saveCashFlow',
    'bank/budget/financial'=>'budget/getFinancialIndicators',
    'bank/budget/financial/off'=>'budget/getFinancialIndicators/$1',
    'bank/budget/graphs'=>'budget/getGraphs',
    'bank/budget/setting-cash'=>'budget/getSettingCash',
    'bank/budget/setting-material'=>'budget/getSettingMaterial',
    'bank/budget/save-setting-material'=>'budget/saveSettingMaterial',
    'bank/budget/balance-products'=>'setting/getBalanceProducts',
    'bank/budget/save-setting-balance'=>'setting/saveBalanceProducts',
    'bank/budget/setting-sales'=>'setting/getSettingSales',
    'bank/budget/save-setting-sales'=>'setting/saveSettingSales',

    'bank/analysis/solvency'=>'analysis/getSolvency',

    'bank/budget/remains-revenue/([0-9]+)/([0-9]+)'=>'budget/getRemainsRevenue/$1/$2',
    'bank/budget/remains-fuel/([0-9]+)/([0-9]+)'=>'budget/getRemainsFuel/$1/$2',
    'bank/budget/remains-labor/([0-9]+)/([0-9]+)'=>'budget/getRemainsLabor/$1/$2',
    'bank/budget/remains-direct/([0-9]+)/([0-9]+)'=>'budget/getRemainsDirect/$1/$2',
    'bank/budget/remains-services/([0-9]+)/([0-9]+)'=>'budget/getRemainsServices/$1/$2',
    'bank/budget/remains-material/([0-3]+)/([0-9]+)/([0-9]+)'=>'budget/getRemainsMaterial/$1/$2/$3',

    'bank/budget'=>'budget/getBudget',

    'bank/store-add-basket'=>'store/addBasket',
    'bank/store-plan'=>'store/getPlanMaterial',
    'bank/store-list'=>'store/getListMaterial',


    'bank/create/crop-plan/([0-9]+)'=>'constructor/getCropPlan/$1',
    'bank/create/crop'=>'constructor/getCrop',
    'bank/create/add-crop'=>'constructor/addCrop',
    'bank/create/create-crop'=>'constructor/createCrop',



    'bank/open-user/([0-9]+)'=>'business/getUser/$1',
    'bank' => 'business/addPlan',
);