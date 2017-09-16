<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Панель управління фермером</title>
    <style>
        .translate{
            width: 1000px;
            margin: auto;
        }
        #truy{
            font-size:100%;
            color:green;
            width: 250px;
            height: 50px;
            position: fixed;
            //position: absolute;
            //top:expression(eval(document.documentElement.scrollTop)+20);
            top: 20px;
            right: 0;
        }
    </style>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/flag-icon/css/flag-icon.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/skins/skin-green.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/other.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/farmer/template/css/style-farmer.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>


</head>
<body class="hold-transition skin-green sidebar-mini">
<nav class="navbar navbar-default">
    <div class="container-fluid">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категорія <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Рослинництво</a></li>
                        <li><a href="#">Овочівництво</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<form class="translate" action="/translate/form" method="post">
<div class="box box-danger">
    <div class="box-header with-border">
    <div style="float: left"><h3 class="box-title">Перевод</h3></div>
        <div style="float: right;"><b id="truy"></b>  </div>
    </div>


    <?php
    $arr = ['action'=>'action', 'action_type'=>'action_type', 'action_type_veg'=>'action_type',
            'action_veg'=>'action','climatic_zone'=>'zone','crop_head'=>'crop', 'crop_head_veg'=>'crop',
            'fuel_type'=>'fuel', 'fuel_type_veg'=>'fuel', 'material_fertilizers'=>'material',
            'material_fertilizers_veg'=>'material','material_ppa'=>'material','material_ppa_veg'=>'material',
            'material_seeds'=>'material','material_seeds_veg'=>'material','material_subtype'=>'subtype',
            'material_subtype_veg'=>'subtype','power_eqt'=>'power', 'power_eqt_veg'=>'power','power_type'=>'power_type',
            'power_type_veg'=>'power_type','tillage_types'=>'tillage','working_eqt'=>'working',
            'working_eqt_veg'=>'working', ];
    foreach ($arr as $key => $value){
    foreach ($date[$key] as $item){?>

    <div class="box-body">
        <div class="row">
            <div class="col-xs-2">
                <input  type="text" class="form-control" value="<?echo $item['id_'.$value]?>" name="id_<?=$value?>">
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="name_<?=$value?>_ua" value="<?echo $item['name_'.$value.'_ua']?>">
            </div>
            <div class="col-xs-4">
                <input data-id="<?=$item['id_'.$value]?>" data-name="id_<?=$value?>" data-table="<?=$key?>" data-title="name_<?=$value?>_en"  type="text" class="form-control edit_en" value="<?echo $item['name_'.$value.'_en']?>" name="name_<?=$value?>_en" >
            </div>
        </div>
    </div>
        <?}?>
    <?}?>
    <button type="submit" class="btn btn-block btn-success">Перевести</button>
</div>
</form>

<script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php SRC::getSrc(); ?>/lib/dist/js/app.min.js"></script>

<script>
    $(document).ready(function(){
        $('.edit_en').change(edit);
        function edit() {
            var id = $(this).attr('data-id');
            var table = $(this).attr('data-table');
            var name = $(this).attr('data-name');
            var title = $(this).attr('data-title');
            var value = $(this).val();

            $.ajax({
                type : 'post',
                url : '/translate/form',
                data : {
                    'id' :  id,
                    'table' : table,
                    'name' : name,
                    'title' : title,
                    'value' : value
                },
                response : 'text',
                success : function(html) {
                    $('#truy').show(100);
                    $('#truy').html(html);
                    setTimeout(function() {
                        $('#truy').hide(200);
                    }, 4000);
                }
            });
        };

        }
    );
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>