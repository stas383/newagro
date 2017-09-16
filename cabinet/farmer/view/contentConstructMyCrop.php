<!-- Main content -->
<style>

    .info-box-icon {
        border-top-left-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 4px;
        display: block;
        float: left;

        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0, 0, 0, 0.2);
    }
    .info-box-icon bg-green{
        min-width: 30px!important;
        max-width: 200px!important;
        min-height: 30px!important;
        max-height: 200px!important;
    }
    .info-box:hover,:active :hover{
        color: #f1f1f3!important;
    }
    a, .targ{
        color: #79a22a;
        cursor: pointer;
    }
    .info-box-number {
        font-weight: bold;
        font-size: 18px;
    }
    .info-box-content{
        color: #79a22a;
    }
    .info-box-number:hover,.info-box-number:active,.info-box-number:focus{
        color: #008d4c;
    }
    .info-box {
        display: block;
        height: 90px;
        background: #fff;
        float: left;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }

    @media (max-width: 1490px ){
        .info-box-number{
            font-size: 16px!important;
        }
        .info-box-number{
            margin-bottom: 4px;
        }
        .col-lg-3 {
            width: 25%!important;
        }
    }
    @media (max-width: 1422px ){
        .info-box-number{
            margin-bottom: -8px;
        }
        .info-box {
            min-width: 206px!important;
        }
        .col-lg-3 {
            width: 25%!important;
        }
        .small-box-footer{
            position: absolute;
    }}
    @media (max-width: 1280px){
        .info-box-number{
            font-size: 14px!important;
        }
        .info-box-number{
            margin-bottom: -2px;
        }
        .small-box-footer{
            font-size: 12px;
        }
    }
    @media (max-width: 1200px) {
        .info-box-number {
            font-size: 14px !important;
        }
        .info-box {
            min-width: 206px!important;
        }
    }
    @media (max-width: 1110px) {
        .small-box-footer {
            margin-right: -160px!important;
        }
    }
    .fa-arrow-circle-right{
        margin-left: 4px!important;
    }
    .small-box-footer{
        color: #79a22a;
    }
    .small-box-footer:hover, .small-box-footer:active,.small-box-footer:focus{
        color: #008d4c;
        transition: 0,7s ease;
    }
    .box-tools{
        float: left;
    }
    .col-md-3 {
        /*width: 25%;*/
    }
    .row{
        margin-top: 10px;
    }
    .fa-fw {
        width: 1.28571429em;
        text-align: center;
    }
    .no{
        margin-left: 10px;
    }
    .n{
        margin-right: 5px;
    }
</style>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=$language['farmer']['133']?></h3>
           <div class="row"> <div class="box-tools col-lg-3">

                <div class="info-box targ" onclick="location.href='/farmer/create/materials'">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-list-alt"></i></span>
                <div class="info-box-content">
                    <a href="/farmer/create/materials<?php echo $crop['id_crop']?>" class="info-box-number"><?=$language['farmer']['145']?></a>
                </div>
                </div>

                <div class="info-box targ" data-toggle="modal" data-target="#myModal">
                <span class="info-box-icon bg-green"><img src="<?php SRC::getSrc(); ?>/cabinet/site/template/img/n.png " style="margin-top: -10px; max-width: 70%"></span>
                <div class="info-box-content info-box-number"><?=$language['farmer']['146']?>
                </div>
                </div>

               </div>
           </div>
            <div class="box-tools">
            <a href="/farmer/create/materials" class="btn btn-success"><?=$language['farmer']['145']?></a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><?=$language['farmer']['146']?><i class="fa fa-fw fa-plus"></i></button>
        </div>
        </div>
    </div>
    <div class="row n">
        <?php foreach ($date['agri_crop_head'] as $crop){ ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="info-box  no">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-list-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number targ">
                        <?php echo $crop['name_crop_ua']?> <a style="float: right" href="/farmer/create/edit-crop/<?php echo $crop['id_crop']?>" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-pencil"></i></a>
                    </span>
                    <br>
                    <a href="/farmer/create/crop-plan/<?php echo $crop['id_crop']?>" class="small-box-footer"><?=$language['farmer']['147']?><i class="fa fa-arrow-circle-right"></i></a>
<!--                    <a href="/farmer/budget/remains-plan/--><?php //echo $crop['id_crop']?><!--/3" class="small-box-footer">технологічна карта<i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="example-modal">
        <div class="modal fade  bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="post" action="/farmer/create/add-crop">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?=$language['farmer']['129']?></h4>
                        </div>
                        <div class="modal-body">
                            <select class="form-control" name="crop">
                                <option value="0"><?=$language['farmer']['213']?></option>
                                <?php
                                    for($x=1;$x<=2;$x++){
                                        foreach ($date['Crop-'.$x] as $crop){?>
                                            <option value="<?php echo $x.'-'.$crop['id_crop']?>"><?php echo $crop['name_crop_ua'];?></option>
                                        <?php }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><?=$language['farmer']['163']?></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['farmer']['157']?></button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!-- /.modal -->
    </div>
</section>
