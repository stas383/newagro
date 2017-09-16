<style>
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
<? //var_dump($date['lib']);?>
<section class="content">
<div class="box">
    <div class="box-body no-padding">
<form action="/farmer-small/save-equipment" method="post">
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
        </thead>
        <tr>
            <th colspan="2"></th>
            <th colspan="2"></th>
            <th ><?=$language['farmer-small']['53']?></th>
            <th id="current_year"><?php echo date('Y')?></th>
        </tr>
        <tr>
            <th><?=$language['farmer-small']['54']?></th>
            <th><?=$language['farmer-small']['55']?></th>
            <th><?=$language['farmer-small']['56']?></th>
            <th><?=$language['farmer-small']['57']?></th>
            <th><?=$language['farmer-small']['58']?></th>
            <th><?=$language['farmer-small']['59']?></th>
        </tr>
        <tbody>
        <tr>
            <td>
                    <input name="name_ua" list="id" class="form-control">
                    <datalist id="id">
                    <?php foreach ($date['lib'] as $type)if($type['type']==5){?>
                            <option value="<?=$type['name_ua']?>"></option>
                    <?php }?>
                    </datalist>
            </td>
            <td>
                <input class="form-control" name="purchase_year" id="purchase_year">
            </td>
            <td>
                <input class="form-control" name="use_term" id="use_term">
            </td>
            <td>
                <input class="form-control" name="purchase_price" id="purchase_price">
            </td>
            <td>
                <input class="form-control" name="depreciation" id="depreciation">
            </td>
            <td>
                <input class="form-control" name="amount_of_amortization" id="amount_of_amortization">
            </td>
        </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success"><?=$language['farmer-small']['60']?></button>
</div>
</form><br>
    <div class="table-responsive">
        <table class="table table-striped well">
            <thead class="head-table-center">
            </thead>
            <tr>
                <th><?=$language['farmer-small']['54']?></th>
            <th><?=$language['farmer-small']['55']?></th>
            <th><?=$language['farmer-small']['56']?></th>
            <th><?=$language['farmer-small']['57']?></th>
            <th><?=$language['farmer-small']['58']?></th>
            <th><?=$language['farmer-small']['59']?></th>
            </tr>
            <tbody>
            <?foreach ($date['equipment'] as $item){?>
            <tr>
                <td>
                    <?php echo $date['lib'][$item['id_equipment']]["name_ua"];?>
                </td>
                <td>
                    <?php echo $item["purchase_year"];?>
                </td>
                <td>
                    <?php echo $item["use_term"];?>
                </td>
                <td>
                    <?php echo$item["purchase_price"];?>
                </td>
                <td>
                    <?php echo $item["depreciation"];?>
                </td>
                <td>
                    <?php echo $item["amount_of_amortization"];?>
                </td>
                <td><a href="/farmer-small/remove-equipment/<? echo $item['id_depreciation']?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
            <?}?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        $("#current_year, #purchase_year, #use_term, #purchase_price").keyup(function () {

                var current_year = parseFloat($('#current_year').text());
                var purchase_year = parseFloat($('#purchase_year').val());
                var use_term = parseFloat($('#use_term').val());
                var purchase_price = parseFloat($('#purchase_price').val());
                var depreciation = purchase_price/use_term;
                var amount_of_amortization = depreciation * (current_year - purchase_year);
                $('#depreciation').val(depreciation);
                $('#amount_of_amortization').val(amount_of_amortization);
        });
    });
</script>