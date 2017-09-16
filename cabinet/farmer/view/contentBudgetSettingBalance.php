<section class="content">
    <form action="/farmer/budget/save-setting-balance" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $language['farmer']['26']?></h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-danger" id="trash" ><i class="fa fa-fw fa-trash-o"></i> <?php echo $language['farmer']['14']?></button>
                    <button type="submit" class="btn btn-success"><?php echo $language['farmer']['15']?></button>
                </div>
            </div>
            <div class="box-body no-padding">
               <table class="table">
                   <thead>
                   <tr>
                       <th class="text-center" rowspan="2"><?php echo $language['farmer']['28']?></th>
                       <th class="text-center" rowspan="2"><?php echo $language['farmer']['29']?></th>
                       <th class="text-center" rowspan="2"><?php echo $language['farmer']['30']?></th>
                       <th class="text-center" colspan="3"><?php echo $language['farmer']['24']?></th>
                       <th class="text-center" rowspan="2"><?php echo $language['farmer']['34']?></th>
                       <th class="text-center" rowspan="2"><?php echo $language['farmer']['35']?></th>
                   </tr>
                   <tr>
                       <th class="text-center" ><?php echo $language['farmer']['31']?></th>
                       <th class="text-center"><?php echo $language['farmer']['32']?></th>
                       <th class="text-center"><?php echo $language['farmer']['33']?></th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php foreach ($date["table"] as $crop){?>
                       <tr>
                           <th class="text-center"><?php echo $crop['name']?></th>
                           <td class="text-center"><input class="form-control classEdit" type="text" name="1<?php echo $crop["id"].$crop["type"]?>" id="1<?php echo $crop["id"].$crop["type"]?>" value="<?php echo $date['date'][$crop["id"].$crop["type"]][1]?>"></td>
                           <td class="text-center" id="m<?php echo $crop["id"].$crop["type"]?>"><?php echo $crop['mass']?></td>
                           <td class="text-center"><input class="form-control classEdit" type="text" name="2<?php echo $crop["id"].$crop["type"]?>" id="2<?php echo $crop["id"].$crop["type"]?>" value="<?php echo $date['date'][$crop["id"].$crop["type"]][2]?>"></td>
                           <td class="text-center"><input class="form-control classEdit" type="text" name="3<?php echo $crop["id"].$crop["type"]?>" id="3<?php echo $crop["id"].$crop["type"]?>" value="<?php echo $date['date'][$crop["id"].$crop["type"]][3]?>"></td>
                           <td class="text-center"><input class="form-control classEdit" type="text" name="4<?php echo $crop["id"].$crop["type"]?>" id="4<?php echo $crop["id"].$crop["type"]?>" value="<?php echo $date['date'][$crop["id"].$crop["type"]][4]?>"></td>
                           <td class="text-center" id="r<?php echo $crop["id"].$crop["type"]?>"></td>
                           <td class="text-center"><input class="form-control classEdit" type="text" name="5<?php echo $crop["id"].$crop["type"]?>" id="5<?php echo $crop["id"].$crop["type"]?>" value="<?php echo $date['date'][$crop["id"].$crop["type"]][5]?>"></td>
                       </tr>
                   <?} ?>
                   </tbody>
               </table>
            </div>
        </div>
    </form>
</section>
<script>
    $(document).ready(function() {
        $(".classEdit").keyup(mass);
        function mass(){
            var id=$(this).attr("id").substr(1);
            var i1=parseFloat($("#1"+id).val());
            var i2=parseFloat($("#2"+id).val());
            var i3=parseFloat($("#3"+id).val());
            var i4=parseFloat($("#4"+id).val());
            var i5=parseFloat($("#5"+id).val());
            var mass=parseFloat($("#m"+id).text());
            if(isNaN(i1)) i1=0;
            if(isNaN(i2)) i2=0;
            if(isNaN(i3)) i3=0;
            if(isNaN(i4)) i4=0;
            if(isNaN(i5)) i5=0;
            if(isNaN(mass)) mass=0;
            var r=(i1+mass)-(i2+i3+i4+i5);
            if(r<0){
                $(this).val($(this).val().substr(1));
                alert("-");
            }
            if(r>0){
                $("#r"+id).text(r);
            }
        }
        $("#trash").click(trash);
        function trash() {
            $('form input[type="text"]').val('');
        }
    });
</script>
