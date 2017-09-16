
<head>
    <style>
        table,tr, th, td {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
        }
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

        #modal_form {
            width: 600px;
            height: 500px; /
            border-radius: 5px;
            border: 3px #000 solid;
            background: #fff;
            position: fixed;
            left: 50%;
            margin-top: -300px;
            margin-left: -250px;
            display: none;
            opacity: 0;
            z-index: 5;
            padding: 20px 10px;
        }
        /* Кнoпкa зaкрыть для тех ктo в тaнке) */
        #modal_form #modal_close {
            width: 21px;
            height: 21px;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            display: block;
        }

        #overlay {
            z-index:3;
            position:fixed;
            background-color:#000;
            opacity:0.8;
            -moz-opacity:0.8;
            filter:alpha(opacity=80);
            width:100%;
            height:100%;
            top:0;
            left:0;
            cursor:pointer;
            display:none;
        }
    </style>
</head>

<body>
<section class="content">
<div class="box">
<form action="/farmer-small/save-edit-crop" method="post">
        <table class="table table-striped well">
            <thead class="head-table-center">
            <tr>
                <th rowspan="2"><?=$language['farmer-small']['24']?></th>
                <th rowspan="2"><?=$language['farmer-small']['25']?></th>
                <th rowspan="2"><?=$language['farmer-small']['26']?></th>
                <th rowspan="2"><?=$language['farmer-small']['42']?></th>
                <th colspan="3" style="text-align:center;"><?=$language['farmer-small']['43']?></th>
            </tr>
            <tr>

                <td style="text-align:center;"><?=$language['farmer-small']['44']?></td>
                <td><?=$language['farmer-small']['45']?></td>
                <td><?=$language['farmer-small']['46']?></td>
            </tr>
            </thead>
            <tbody>
            <? foreach($date['my_crop'] as $editCrop)if($editCrop['id']==$date['id']){
                ?>
            <td>
                <input class="form-control" name="name_crop" list="crop_list1" value="<?if($_COOKIE['lang']=='ua'){echo $editCrop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $editCrop['name_crop_en'];}?>" disabled>
                <datalist id="crop_list1">
                    <?php
                    foreach ($date['head'] as $key){?>
                        <option value="<?php echo trim($key['name_crop_ua']);?>" selected></option>
                    <?php }?>
                </datalist>
            </td>
            <td>
            <input type="hidden" name="id_crop" value="<?=trim($editCrop['id']);?>">
            <input class="form-control" id = "area" name="area" type="text" value="<?=$editCrop['area']?>"></td>
            <td><input class="form-control" id= "crop_capacity" name="crop_capacity" type="text" value="<?=$editCrop['yaled']?>"></td>
            <td><input class="form-control" id= "avr_price" name="avr_price" type="text" value="<?=$editCrop['avr_price']?>"></td>
            <td><input  class="form-control" id = "market" name="market" type="text" value="<?=$editCrop['market']?>"></td>
            <td><input  class="form-control" id = "intermediaries_resellers" name="intermediaries_resellers" type="text" value="<?=$editCrop['intermediaries_resellers']?>"></td>
            <td><input  class="form-control" id = "other_channels" name="other_channels" type="text" value="<?=$editCrop['other_channels']?>"></td>
            <?php }?>
            </tbody>
        </table>
    <table class="table table-striped well" style="border-radius: inherit;">
        <tr>
            <td colspan="4"><?=$language['farmer-small']['47']?></td>
            <?php for($i=0;$i<12;$i++){?>
                <td><?php echo $i+1;?></td>
            <?php }?>
            <td><?=$language['farmer-small']['51']?></td>
        </tr>
        <tr>
            <td colspan="17" style="text-align: left"><?=$language['farmer-small']['48']?></td>
        </tr>
        <tr>
            <td rowspan="2" style="width: 50px; border-right: none"></td>
            <td rowspan="2" align="center" valign="top" style="width: 80px"><?=$language['farmer-small']['44']?></td>
            <td rowspan="2" align="center" valign="top"><?=$language['farmer-small']['49']?> <input class="inpt" value="" id="all_other_market" ></td>
            <td>%</td>
            <?php for($i=1; $i<=13; $i++){?>
                <td><input class="inpt market" id="market_<?=$i;?>" name="market_<?=$i;?>" value ="<?=$date['proc'][0]['sp_'.$i]?>"></td>
            <?php }?>
        </tr>

        <tr valign="top">
            <td><?=$language['farmer-small']['50']?></td>
            <?php for($i=1; $i<=13; $i++){?>
                <td><input class="inpt price_market" id="price_market_<?=$i;?>" name="price_market_<?=$i;?>" value ="<?=$date['proc'][1]['sp_'.$i]?>"></td>
            <?php }?>
        </tr>
        <tr>
            <td rowspan="2" style="border: none"></td>
            <td rowspan="2" align="center" valign="top"> <?=$language['farmer-small']['45']?></td>
            <td rowspan="2" align="center" valign="top"><?=$language['farmer-small']['49']?> <input class="inpt" value="" id="all_other_insider" ></td>
            <td>%</td>
            <?php for($i=1; $i<=13; $i++){?>
                <td><input class="inpt insider" id="insider_<?=$i;?>" name="insider_<?=$i;?>" value="<?=$date['proc'][2]['sp_'.$i]?>"></td>
            <?php }?>
        </tr>
        <tr valign="top">
            <td><?=$language['farmer-small']['50']?></td>
            <?php for($i=1; $i<=13; $i++){?>
                <td><input class="inpt price_insider" id="price_insider_<?=$i;?>" name="price_insider_<?=$i;?>" value="<?=$date['proc'][3]['sp_'.$i]?>"></td>
            <?php }?>
        </tr>
        <tr>
            <td rowspan="2"></td>
            <td rowspan="2" align="center" valign="top"><?=$language['farmer-small']['46']?></td>
            <td rowspan="2" align="center" valign="top"><?=$language['farmer-small']['49']?><input class="inpt" type="text" name="all_other_chanel" id="all_other_chanel"></td>
            <td>%</td>
            <?php for($i=1; $i<=13; $i++){?>
                <td><input class="inpt channel" id="channel_<?=$i;?>" name="channel_<?=$i;?>" value="<?=$date['proc'][4]['sp_'.$i]?>"></td>
            <?php }?>
        </tr>
        <tr valign="top">
            <td ><?=$language['farmer-small']['50']?></td>
            <?php for($i=1; $i<=13; $i++){?>
            <td><input class="inpt price_channel" id="price_channel_<?=$i;?>" name="price_channel_<?=$i;?>" value="<?=$date['proc'][5]['sp_'.$i]?>"></td>
            <?php }?>
        </tr>
    </table>
    <div class="box-body" style="text-align:center;">
        <button class="btn  btn-success" style="width: 14%" type="submit" id="go">
            <?=$language['farmer-small']['52']?>
        </button>
    </div>

</form>

</div>
</section>
<div id="overlay" style="display: none;"></div>

</body>
    <script>
            $(document).ready(function() {
                
                    var area = parseFloat($("#area").val());
                    var crop_capacity = parseFloat($("#crop_capacity").val());
                    var avr_price = area*crop_capacity*100;
                    $("#avr_price").val(avr_price);
                
                $('#market, #intermediaries_resellers').keyup(function () {
                    var market = parseFloat($("#market").val());
                    var intermediaries_resellers = parseFloat($("#intermediaries_resellers").val());
                    var other_channels = 100 - intermediaries_resellers - market;
                    $("#other_channels").val(other_channels);
                    var summ = market + intermediaries_resellers + other_channels;
                    if (summ > 100) {
                        $(this).val("");
                        alert("asdasd");
                    }
                });
                /*$("#avr_price, #market, #intermediaries_resellers, #other_channels" ).ready(function () {
                    var avr_price = parseFloat($('#avr_price').val());
                    var market = parseFloat($('#market').val());
                    var intermediaries_resellers = parseFloat($('#intermediaries_resellers').val());
                    var other_channels = parseFloat($('#other_channels').val());
                    var avr_price_market = avr_price*market/100;
                    var avr_price_insider = avr_price*intermediaries_resellers/100;
                    var avr_price_chanel = avr_price*other_channels/100;
                    $("#all_other_market").val(avr_price_market);
                    $("#all_other_insider").val(avr_price_insider);
                    $("#all_other_chanel").val(avr_price_chanel);

                });
*/
                 $("#avr_price, #market, #intermediaries_resellers, #other_channels" ).keyup(function () {
                    var avr_price = parseFloat($('#avr_price').val());
                    var market = parseFloat($('#market').val());
                    var intermediaries_resellers = parseFloat($('#intermediaries_resellers').val());
                    var other_channels = parseFloat($('#other_channels').val());
                    var avr_price_market = avr_price*market/100;
                    var avr_price_insider = avr_price*intermediaries_resellers/100;
                    var avr_price_chanel = avr_price*other_channels/100;
                    $("#all_other_market").val(avr_price_market);
                    $("#all_other_insider").val(avr_price_insider);
                    $("#all_other_chanel").val(avr_price_chanel);

                });
                $(".market").keyup(market);
                    function market() {
                    var summ = 0;
                    for(i=1; i<13; i++) {
                        var y = parseFloat($('#market_' + i).val());
                        if (isNaN(y)){ y = 0;}
                        summ = summ +y;
                        if(summ>100 || summ<0) {
                            var value=$(this).val();
                            $(this).val('');
                            summ= summ-parseFloat(value);
                            alert('error');
                        }
                    }
                    var avr_price = parseFloat($('#avr_price').val());
                    var market = parseFloat($('#market').val());
                    var avr_price_market = avr_price*market/100;
                    var avr_price_market1 = avr_price_market - avr_price_market*summ/100;
                    $("#all_other_market").val(avr_price_market1);
                    $("#market_13").val(summ);
                }
                $(".insider").keyup(insider);
                function insider() {
                    var summ = 0;
                    for(i=1; i<13; i++) {
                        var y = parseFloat($('#insider_' + i).val());
                        if (isNaN(y)){ y = 0;}
                        summ = summ +y;
                        if(summ>100 || summ<0) {
                            var value=$(this).val();
                            $(this).val('');
                            summ= summ-parseFloat(value);
                            alert('error');
                        }
                    }
                    var avr_price = parseFloat($('#avr_price').val());
                    var insider = parseFloat($('#intermediaries_resellers').val());
                    var avr_price_market = avr_price*insider/100;
                    var avr_price_market1 = avr_price_market - avr_price_market*summ/100;
                    $("#all_other_insider").val(avr_price_market1);
                    $("#insider_13").val(summ);
                }
                $(".channel").keyup(channel);
                function channel() {
                    var summ = 0;
                    for(i=1; i<13; i++) {
                        var y = parseFloat($('#channel_' + i).val());
                        if (isNaN(y)){ y = 0;}
                        summ = summ +y;
                        if(summ>100 || summ<0) {
                            var value=$(this).val();
                            $(this).val('');
                            summ= summ-parseFloat(value);
                            alert('error');
                        }
                    }
                    var avr_price = parseFloat($('#avr_price').val());
                    var other_channels = parseFloat($('#other_channels').val());
                    var avr_price_market = avr_price*other_channels/100;
                    var avr_price_market1 = avr_price_market - avr_price_market*summ/100;
                    $("#all_other_chanel").val(avr_price_market1);
                    $("#channel_13").val(summ);
                }
                $(".price_market").keyup(price_market);
                    function price_market() {
                    var summ = 0;
                    for(i=1; i<13; i++) {
                        var y = parseFloat($('#price_market_' + i).val());
                        var x = parseFloat($('#market_'+i).val());
                        var val = parseFloat($('#market_13').val());
                        if (isNaN(y)){ y = 0;}
                        if (isNaN(x)){x=0;}
                        if (isNaN(val)){val=0;}
                        summ = summ +y*x;
                        $("#price_market_13").val(summ/val);
                    }
                    }
                $(".price_channel").keyup(price_channel);
                function price_channel() {
                    var summ = 0;
                    for(i=1; i<13; i++) {
                        var y = parseFloat($('#price_channel_' + i).val());
                        var x = parseFloat($('#channel_'+i).val());
                        var val = parseFloat($("#channel_13").val());
                        if (isNaN(y)){ y = 0;}
                        if (isNaN(x)){x=0;}
                        if (isNaN(val)){val=0;}
                        summ = summ + x*y;
                        $("#price_channel_13").val(summ/val);
                    }
                }
                $(".price_insider").keyup(price_insider);
                function price_insider() {
                    var summ = 0;
                    for(i=1; i<13; i++) {
                        var y = parseFloat($('#price_insider_' + i).val());
                        var x = parseFloat($('#insider_'+i).val());
                        var val = parseFloat($("#insider_13").val());
                        if (isNaN(y)){ y = 0;}
                        if (isNaN(x)){x=0;}
                        if (isNaN(val)){val=0;}
                        summ = summ + x*y;
                        $("#price_insider_13").val(summ/val);
                    }
                }

                $('.edit_en').change(edit);
                function edit() {
                    var id_crop = $(this).attr('data-id-crop');
                    var area = $(this).val();
                    var crop_capacity = $(this).val();
                    var avr_price = $(this).val();
                    var market = $(this).val();
                    var intermediaries_resellers = $(this).val();
                    var other_channels = $(this).val();
                    var all_other_chanel = $(this).val();
                    $.ajax({
                        type : 'post',
                        url : '/farmer-small/save-crop',
                        data : {
                            'id_crop' :  id_crop,
                            'area': area,
                            'crop_capacity': crop_capacity,
                            'avr_price': avr_price,
                            'market': market,
                            'intermediaries_resellers': intermediaries_resellers,
                            'other_channels': other_channels,
                            'all_other_chanel':all_other_chanel,
                    },
                        response : 'text',
                        success : function(html) {
                            $('#truy').hide(200);
                            $('#truy').html(html);
                            $('#truy').show(200);
                        }
                    });
                }

                $('#go_crop').click( function(event){
                    event.preventDefault();
                    $('#overlay').fadeIn(400,
                        function(){
                            $('#modal_form')
                                .css('display', 'block')
                                .animate({opacity: 1, top: '50%'}, 200);
                        });
                });
                /* Зaкрытие мoдaльнoгo oкнa*/
                $('#modal_close, #overlay').click( function(){
                    $('#modal_form')
                        .animate({opacity: 0, top: '45%'}, 200,
                            function(){
                                $(this).css('display', 'none');
                                $('#overlay').fadeOut(400);
                            }
                        );
                });

                $("#name_crop_ua, #name_crop_en").change(asd);
                function asd() {
                    var name_crop_ua = $(this).val();
                    var name_crop_en = $(this).val();
                    $.ajax({
                        type : 'post',
                        url : '/farmer-small/save-my-crop',
                        data : {
                            'name_crop_ua' : name_crop_ua,
                            'name_crop_en' : name_crop_en
                        }
                    });
                }

            });

    </script>