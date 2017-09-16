<?php
$setting=array(
    array(
        'name_php'=>'8',
        'name_ua'=>'Отримання нової позики',
        'name_en'=>'Getting a new loan',
    ),
    array(
        'name_php'=>'9',
        'name_ua'=>'Погашення відсотків по новій позиці',
        'name_en'=>'Redemption of interest on a new loan',
    ),
    array(
        'name_php'=>'10',
        'name_ua'=>'Погашення тіла нової позики',
        'name_en'=>'Repayment of a new loan body',
    ),
);
$bank=array(
    array(
        'name_php'=>'1',
        'name_ua'=>'Сума нової позики',
        'name_en'=>'Amount of new loan',
        'type'=>'input'
    ),
    array(
        'name_php'=>'2',
        'name_ua'=>'Ефективна відсоткова ставка, %',
        'name_en'=>'Effective interest rate, %',
        'type'=>'input'
    ),
    array(
        'name_php'=>'3',
        'name_ua'=>'Термін надання нової позики, місяців',
        'name_en'=>'The term of a new loan, months',
        'type'=>'input'
    ),
    array(
        'name_php'=>'4',
        'name_ua'=>'Місяць отримання нової позики',
        'name_en'=>'Month of getting a new loan',
        'type'=>'select'
    ),
    array(
        'name_php'=>'5',
        'name_ua'=>'Місяць початку погашення відсотків',
        'name_en'=>'Month of interest repayment',
        'type'=>'select'
    ),
    array(
        'name_php'=>'6',
        'name_ua'=>'Місяць сплати тіла нової позики',
        'name_en'=>'A month of paying the body of a new loan',
        'type'=>'select'
    ),
);
?>
<script>
    $(document).ready(function () {
        $('.BankEdit').keyup(bank);
        $('.BankEdit').click(bank);
        function bank() {
            for (x=1;x<=12;x++){
                $('#pr8-'+x).val('');
                $('#pr9-'+x).val('');
                $('#pr10-'+x).val('');
            }
            var b1=parseFloat($('#bank1').val());
            var b2=parseFloat($('#bank2').val())/100;
            var b3=parseFloat($('#bank3').val());
            var b4=parseFloat($('#bank4').val());
            var b5=parseFloat($('#bank5').val());
            var b6=parseFloat($('#bank6').val());

            $('#pr8-'+b4).val(b1);
            $('#pr10-'+b6).val(b1);
            var credit= b1*(b2*b3/12)/b3;
            for(c=b5;c<b5+b3; c++){
                $('#pr9-'+c).val(credit);
            }
        }
    });
</script>
<section class="content">
    <form action="/farmer/budget/save-financial-bank" method="post" >
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=$language['farmer']['246']?></h3>
                <div class="box-tools">
                    <button type="submit" class="btn btn-success"><?php echo $language['farmer']['15']?></button>
                </div>
            </div>
        <div class="box-body">
            <div class="row">
                    <?php foreach ($bank as $bank){ ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php if($_COOKIE['lang']=='ua'){echo $bank['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $bank['name_en'];}?></label>
                            <?php if($bank['type']=='input'){ ?>
                            <input value="<? echo $date['bank'][0]['b'.$bank['name_php']]?>" type="text" name="bank<?php echo $bank['name_php']?>" id="bank<?php echo $bank['name_php']?>" class="form-control BankEdit" >
                            <?} if($bank['type']=='select'){?>
                            <select type="text" name="bank<?php echo $bank['name_php']?>" id="bank<?php echo $bank['name_php']?>" class="form-control BankEdit">
                                <?php for ($m=1; $m<=12;$m++){ ?>
                                <option <? if($date['bank'][0]['b'.$bank['name_php']]==$m) echo "selected"?>><?php echo $m?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                    </div>
                    <?php }?>
            </div>
            <br>
            <table class="table">
                <thead>
                <tr>
                    <td></td>
                    <?php for($m=1; $m<=12; $m++){?>
                        <td><?php echo $m?></td>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($setting as $setting){ ?>
                    <tr>
                        <td class="<?php echo $setting["class"]?>"><?php if($_COOKIE['lang']=='ua'){echo $setting['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $setting['name_en'];}?></td>
                        <?php for($m=1; $m<=12; $m++){?>
                                <td><input id="pr<?php echo $setting["name_php"]."-".$m ?>" class="form-control classEdit" type="text" name="pr<?php echo $setting["name_php"].'-'.$m?>" value="<?php echo $date['proc'][$setting["name_php"]][$m]?>" ></td>
                        <?php }?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </form>
</section>