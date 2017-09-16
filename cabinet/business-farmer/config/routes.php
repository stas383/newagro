<?php
if($_SESSION['id_user_b']==false) {
    return array(
        'business-farmer/login_on' => 'login/loginOn',
        'business-farmer/create_user'=>'login/createUser',
        'business-farmer/save_user'=>'login/saveUser',
        'business-farmer' => 'login/login',
    );
}else{
    return array(
        'business-farmer/field'=>'field/field',
        'business-farmer/create_field'=>'field/createField',
        'business-farmer/edit_field'=>'field/editField',

        'business-farmer/sowing'=>'sowing/sowing',
        'business-farmer/create_sowing'=>'sowing/createSowing',
        'business-farmer/edit_sowing'=>'sowing/editSowing',

        'business-farmer/technology_sheet'=>'technology/technologySheet',
        'business-farmer/create_technology'=>'technology/createTechnology',
        'business-farmer/copy_technology/([0-9]+)'=>'technology/copyTechnology/$1',
        'business-farmer/edit_technology/([0-9]+)'=>'technology/editTechnology/$1',

        'business-farmer/user' => 'user/listUser',
        'business-farmer/create_user'=>'user/createUser',
        'business-farmer/login_off' =>'login/loginOff',
        'business-farmer/edit_user'=>'user/editUser',

        'business-farmer/employee'=>'employee/employee',
        'business-farmer/create_employee'=>'employee/createEmployee',
        'business-farmer/edit_employee'=>'employee/editEmployee',
        'business-farmer/remove_employee/([0-9]+)'=>'employee/removeEmployee/$1',

        'business-farmer' => 'user/listUser',

    );
}