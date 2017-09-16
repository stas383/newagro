<?
  $subtype = array(
    71=>'Гербіцид',
    72=>'Фунгіцид',
    73=>'Інсектицид',
    74=>'Ретардант',
    75=>'Протруйник насіння',
    76=>'Десикант',
    77=>'Інші ЗЗР',
    );
  $unit = array(
    1=>'kg',
    2=>'l',
    3=>'t'
    );

  echo "<pre>";
  var_dump($date);die;
?>
    <div class="box-bodyn">
      <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content"><?=$language['new-farmer']['7']?></strong>
                </h1>
          </div>
    </div>
    <div class="box">
        <div class="table-responsive">
      <div class="col-lg-2">
      </div>
      <div class="col-lg-9">
         <table class="table table-bordered">
        <thead>
          <tr class="tabletop">
            <th colspan="4" style="text-align: center;"><?=$language['new-farmer']['115']?></th>
            <th rowspan="2" style="text-align: center;"><?=$language['new-farmer']['116']?></th>
          </tr>
          <tr>
              <th><?=$language['new-farmer']['117']?></th>
              <th><?=$language['new-farmer']['118']?></th>
              <th><?=$language['new-farmer']['119']?></th>
              <th><?=$language['new-farmer']['120']?></th>
          </tr>
        </thead>
        <tbody>
        <?
        $open_remains=0;
        foreach($date['budget']['needed_material'] as $key=>$needed_material){
            foreach($date['material_types'] as $material_type)if($material_type['id_action'] == $needed_material['type']){
                $open_remains++;?>
                <tr>
                    <td><? if($needed_material['type'] == 17 or $needed_material['type'] ==18){echo $material_type['name_ua'];}else{echo $material_type['name_ua'].": ".'<b>'.$subtype[$needed_material['subtype_material']].'</b>';}?></td>
                    <td><a class="btn open_remains" data-id="<?=$open_remains?>"><?=$needed_material['name']?></a></td>
                    <td><?=$needed_material['planing_norm']?></td>
                    <td><?=$unit[$needed_material['planing_unit']]?></td>
                    <? foreach($date['storage']['storage_material_fact'] as $str_mat)if($needed_material['name'] == $str_mat['storage_material']){
                        $min[$key]=$str_mat['storage_quantity'];
                    }?>
                    <td><?if($needed_material['planing_norm']-$min[$key] <= 0){echo '0';}else{echo $needed_material['planing_norm']-$min[$key];} ?></td>
                </tr>
                <?php foreach ($date['budget']['needed_material_field'][$key] as $value){?>
                <tr class="remains_<?=$open_remains?>" style="display: none">
                    <td style="padding-left: 30px">field: <?=$value['field_name']?></td>
                    <td>crop: <?=$value['crop']?></td>
                    <td><?=$value['planing_norm']?></td>
                    <td><?=$unit[$needed_material['planing_unit']]?></td>
                    <td></td>
                </tr>
                <?php } ?>
        <?}?>
        <?}?>
        </tbody>
      </table>
      </div>
      <div class="col-lg-1">
      </div>
        </div>
</div>
<script>
    $(document).ready(function(){
        $('.open_remains').click(function () {
           var id=$(this).attr('data-id');
            $('.remains_'+id).toggle();
        });
    });
</script>
