<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.09.2017
 * Time: 11:10
 */
/*echo "<pre>";
var_dump($date['other_costs']);die;*/
?>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Budget</strong>
            </h1>
        </div>
    </div>
    <div class="rown">

        <div class="table-responsive">
            <a href="#fixEquipment" data-toggle="modal" class="btn btn-success" style="float: left;">Ремонт основних засобів</a>
            <a href="#other_costs" data-toggle="modal" class="btn btn-primary other_costs_op" style="float: left;">Інші витрати</a><br><br>
            <table class="table">
                <tbody>
                <?php foreach ($date['table'] as $table){?>
                    <tr>
                        <td class="<?=$table['class']?>"><?if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?></td>
                        <?php foreach ($date['budget']['crop_'.$table['array']] as $key => $value){?>
                            <td <? if($table['array'] =='budget_crop_name') echo "colspan=2 style='text-align:center;'"?> ><a href="/new-farmer/budget"><?if($table['array']!='budget_crop_name') echo number_format($value); else echo $value;?></a></td>
                            <? if($table['array']!='budget_crop_name'){?><td><a><? echo number_format($date['budget']['fact_'.$table['array']][$key]);?></a></td><?}?>
                        <?} ?>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
        <!--<div class="col-lg-12" style="text-align: center;">
            <a href="/new-farmer/save_budget" class="btn btnn btn-success">Сохранить бюджет</a>
        </div>-->
    </div>

</div>

<div id="fixEquipment" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content wt">
                    <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="box-title">Витрати на ремонт основних засобів</span>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Фактичні витрати на ремонт</label>
                                <input class="form-control inphead plan_costs_fix"  type="text" name="fact_costs_fix" value="<?=$date['other_costs'][0]['costs_fact']?>">
                            </div>
                            <div class="col-lg-6">
                                <label>Коментар</label>
                                <textarea name="fix_comments" id="comments_fix" class="form-control inphead"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                        <button type="submit" class="btn btn-primaryn save_fix" data-dismiss="modal" data-kind="2" data-type="2"><?=$language['new-farmer']['27']?></button>
                    </div>
                </div>
        </div>
    </div>
    <div id="other_costs" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content wt">
                    <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="box-title">Інші витрати</span>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Фактичні інші витрати</label>
                                <input class="form-control inphead plan_other_costs"  type="text" name="fact_other_costs" value="<?=$date['other_costs'][1]['costs_fact']?>">
                            </div>
                            <div class="col-lg-6">
                                <label>Коментар</label>
                                <textarea name="other_comments" id="comments" class="form-control inphead"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                        <button type="submit" class="btn btn-primaryn save_other" data-dismiss="modal" 
                        data-kind="2" data-type="3"><?=$language['new-farmer']['27']?></button>
                    </div>
                </div>
        </div>
    </div>
<script>
    $(document).ready(function () {

        $('.save_fix').click(function () {
            var plan_cost_fix = $('.plan_costs_fix').val();
            var costs_type = $(this).attr('data-type');
            var comments = $("#comments_fix").val();
            var kind = $(this).attr('data-kind');
            $.ajax({
                type : 'post',
                url : '/new-farmer/save_costs',
                data : {
                    'costs_plan' : plan_cost_fix,
                    'costs_type' : costs_type,
                    'costs_kind' : kind,
                    'costs_comments':comments
                }
            });
        });
        $('.save_other').click(function () {
            var plan_other_costs = $('.plan_other_costs').val();
            var costs_type = $(this).attr('data-type');
            var costs_comments = $('#comments_other').val();
            var kind = $(this).attr('data-kind');
            $.ajax({
                type : 'post',
                url : '/new-farmer/save_costs',
                data : {
                    'costs_plan' : plan_other_costs,
                    'costs_type' : costs_type,
                    'costs_kind' : kind,
                    'costs_comments':costs_comments
                }
            });
        });
    });
</script>