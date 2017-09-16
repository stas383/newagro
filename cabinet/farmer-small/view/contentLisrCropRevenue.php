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
    a, .targ{
        color: #79a22a;
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

    /*media box size*/
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
            min-width: 80%;
        }
    }
    @media (max-width: 1110px) {
        .small-box-footer {
            margin-right: -160px!important;
        }
    }

</style>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$language['farmer-small']['4']?></h3>
        </div>
        <div class="box-body">
<div class="row">
<? foreach($date['my_crop'] as $val){?>
    <div class="box-tools col-lg-3">
	
            <div class="info-box targ">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-list-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">
                         <a href="<? SRC::getSrc();?>/farmer-small/edit-crop/<?=$val['id']?>" class="info-box-number"><?if($_COOKIE['lang']=='ua') {echo $val['name_crop_ua'];}
                             elseif ($_COOKIE['lang']=='gb') {
                                 echo $val['name_crop_en'];
                             }
                             ?>
                                 
                             </a>
                    </span>
                    <br>
                </div>
            </div>
    
    </div>

    <?}?>
</div>
        </div>
    </div>
</section>