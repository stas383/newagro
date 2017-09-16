<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22.08.2017
 * Time: 16:02
 */
 $month = array(
     1=>'January',
     2=>'February',
     3=>'March',
     4=>'April',
     5=>'May',
     6=>'June',
     7=>'July',
     8=>'August',
     9=>'September',
     10=>'October',
     11=>'November',
     12=>'December',
 );
/* echo "<pre>";
 var_dump($date['price']);die;*/
?>
<head>
    <style>
        .inpt {
            height: 23px;
            background: #fff;
            width: 100%;
            padding: 1px;
            font-weight: 600;
            color: #79a22a!important;
            font-size: 14px;
            border: 1px solid rgba(121, 162, 42, 0.5);
            border-radius: 2px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .inpt:focus {
            border-color: #79a22a !important;
            box-shadow: none!important;
        }
    </style>
</head>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Sales price</strong>
            </h1>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="rown">
                <div class="table-responsive">
                    <div class="col-lg-12">
                        <form method="post" action="">
                        <table class="table table-striped well" style="border-radius: inherit;">
                            <tr>
                                <td><?=$language['farmer-small']['47']?></td>
                                <?php for($i=1;$i<13;$i++){?>
                                    <td style="text-align: center"><?php echo $month[$i];?></td>
                                <?php }?>
                                <td><?=$language['farmer-small']['51']?></td>
                            </tr>
                            <? foreach ($date['crop'] as $crop){?>
                            <tr>
                                <td align="center" valign="top" style="width: 80px"><?=$crop['name_crop_ua']?></td>
                                <?php for($i=1; $i<=12; $i++){?>
                                    <td><input class="inpt market" id="crop_<? echo $i."_".$crop['id_crop'];?>" name="price_<?=$i;?>" value="<?if($crop['id_crop'] == $date['price'][$crop['id_crop']]['id_crop']){echo $date['price'][$crop['id_crop']]['price_'.$i];}?>"></td>
                                <?php }?>
                                <td><button class="btn btn-success save_price" data-id_crop="<?=$crop['id_crop']?>">Save price</button></td>
                            </tr>
                            <?}?>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.save_price').click(function () {
            var id_crop = $(this).attr('data-id_crop');
            var price_1 = $('#crop_1_'+id_crop).val();
            var price_2 = $('#crop_2_'+id_crop).val();
            var price_3 = $('#crop_3_'+id_crop).val();
            var price_4 = $('#crop_4_'+id_crop).val();
            var price_5 = $('#crop_5_'+id_crop).val();
            var price_6 = $('#crop_6_'+id_crop).val();
            var price_7 = $('#crop_7_'+id_crop).val();
            var price_8 = $('#crop_8_'+id_crop).val();
            var price_9 = $('#crop_9_'+id_crop).val();
            var price_10 = $('#crop_10_'+id_crop).val();
            var price_11 = $('#crop_11_'+id_crop).val();
            var price_12 = $('#crop_12_'+id_crop).val();

            $.ajax({
                type : 'post',
                url : '/new-farmer/add_price',
                data : {
                    'id_crop' : id_crop,
                    'price_1' : price_1,
                    'price_2' : price_2,
                    'price_3' : price_3,
                    'price_4' : price_4,
                    'price_5' : price_5,
                    'price_6' : price_6,
                    'price_7' : price_7,
                    'price_8' : price_8,
                    'price_9' : price_9,
                    'price_10' : price_10,
                    'price_11' : price_11,
                    'price_12' : price_12
                }
            });
        });
    });
</script>
