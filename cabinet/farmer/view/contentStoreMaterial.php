<style xmlns="http://www.w3.org/1999/html">
    .cursor {
        cursor: pointer;
    }
    .logo-fabricator{
        border: 1px solid #c5c5c5;
        height: 200px;
        text-align: center;
        margin-left: 20px;
        margin-top: 20px;
    }
    .logo-fabricator img{
        padding: 10px;
        cursor: pointer;
        max-width: 100%;
        height: 100%;
    }
    .logo-fabricator a{
        cursor: pointer;
        max-height: 100px;
        border-radius: 2px;
        font-size: 17px;
        display: block;
        width: 100%;
        height: 100%;
        vertical-align: middle;
        margin-top: 70px;
    }
    .store-material, .fabricator_material{
        display: none;
    }
    .product{
        padding: 0;
        height: 330px;
        border-left: #00a65a solid 1px;
        border-right: #00a65a solid 1px;
        margin-top: 20px ;
    }
    .product:hover{
        box-shadow: 0 0 20px 4px rgba(0, 0, 0, 0.38);
    }
    .product img{
        padding: 20px;
        height: 200px;
    }
    .price{
        padding: 10px;
        margin: 20px;
        background: rgba(0, 166, 90, 0.3);
        color: #333;
        display: inline-block;
        font-size: 1.1em;
    }
    .g-price {
        font-size: 1.5rem;
        line-height: 1em;
    }
    .product_head{
        text-align: center;
    }
    .product_title{

    }
    #fab_big_logo{
        display: block;
    width: 200px;
    margin: 0px auto;
    }

</style>
<?php
$title_type[1]="Насіння";
$title_type[2]="Добрива";
$title_type[3]="ЗЗР";
?>
<div class="box-body">
    <div class="box-group" id="according">
            <div class="row logo-fabricator-block">
        <?php foreach ($date["fabricator_id"] as $fabricator_id){?>
            <?php
            if (file_exists( ROOT."/cabinet/distributor/template/images/fabricator/".$fabricator_id.".png")) {?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="logo-fabricator">
                        <img title="<?php echo $date['fabricator_name'][$fabricator_id] ?>" class="fabricator_open" id="<?php echo $fabricator_id?>" src="<?php SRC::getSrc();?>/cabinet/distributor/template/images/fabricator/<?php echo $fabricator_id?>.png">
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="logo-fabricator">
                        <a title="<?php echo $date['fabricator_name'][$fabricator_id] ?>" class="fabricator_open" id="<?php echo $fabricator_id?>"><?php echo $date['fabricator_name'][$fabricator_id] ?></a>
                    </div>
                </div>
            <? }
            ?>
        <?php }?>
            </div>
        <div class="store-material">
            <img src="" id="fab_big_logo">
            <hr style="border-color: #00a65a;">
            <button id="price_sort" class="btn">сортувати за ціною</button>
            <button id="name_sort" class="btn">сортувати за назвою</button>
            <div class="row">
            <?php foreach ($date["distributor_material"] as $material): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 product fabricator_material fb_<?php echo $material['fabricator']?>" data-price="<?=$material['material_qty']*$material['material_price']?>" data-name="<?php echo $material['material_name'] ?>">
                    <div class="product_head">
                        <img title="<?php echo $material['company_name'] ?>" src="<?php SRC::getSrc() ?>/cabinet/distributor/template/images/distributor/<?php echo $material['id_user']?>.png">
                        <p id="name_material_<?php echo $material['id_material'] ?>" class="product_title"><?php echo $material['material_name']?></p>
                        <p class="product_title"><?php echo $material['company_name'] ?></p>
                    </div>
                    <div class="price"><?php echo number_format($material['material_qty']*$material['material_price'], 2)?><span class="g-price"> грн/га</span></div>
                    <a class="btn btn-success open_material"
                       data-id="<?php echo $material['id_material']?>"
                       data-material_name="<?php echo $material['material_name']?>"
                       data-open_company_name="<?php echo $material['company_name'] ?>"
                       data-fabricator="<?php echo $date['fabricator_name'][$material['fabricator']] ?>"
                       data-material_qty="<?php echo $material['material_qty'] ?>"
                       data-material_price="<?php echo $material['material_price'] ?>"
                       data-price_two="<?php echo $material['price_two'] ?>"
                       data-description="<?php echo $material['description'] ?>"
                    >вибрати</a>
                </div>
            <?php endforeach;?>
            </div>
        </div>
        <div class="example-modal">
            <div class="modal fade  bs-example-modal-lg" id="product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="open_matrial_name"></h4>
                        </div>
                        <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Виробник</th>
                                            <th id="open_fabricator"></th>
                                        </tr>
                                        <tr>
                                            <th>Дистриб'ютор</th>
                                            <th id="open_company_name"></th>
                                        </tr>
                                        <tr>
                                            <th>Норма внесення,  кг/га</th>
                                            <th id="open_material_qty"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>грошові кошти</th>
                                        <th id="open_price"></th>
                                        <td><button class="btn btn-block btn-success btn-xs add-basket" data-material="" data-price="1"
                                            <i class="fa fa-fw fa-check"></i>обрати</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>товарний кредит</th>
                                        <th id="open_price_two"></th>
                                        <td><button class="btn btn-block btn-success btn-xs add-basket" data-material="" data-price="2"
                                            <i class="fa fa-fw fa-check"></i>обрати</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div data-plan="<?php echo $date['plan']?>" data-nomer="<?php echo $date['nomer']?>" data-table="<?php echo $date['type']?>" data-crop="<?php echo $date['id_crop']?>" id="data"></div>
        <script>
            jQuery.fn.sortElements = (function () {
                var sort = [].sort;
                return function (comparator, getSortable) {
                    getSortable = getSortable ||
                        function () {
                            return this;
                        };
                    var placements = this.map(function () {
                        var sortElement = getSortable.call(this),
                            parentNode = sortElement.parentNode,
                            nextSibling = parentNode.insertBefore(
                                document.createTextNode(''), sortElement.nextSibling);
                        return function () {
                            if (parentNode === this) {
                                throw new Error("You can't sort elements if any one is a descendant of another.");
                            }
                            // Insert before flag:
                            parentNode.insertBefore(this, nextSibling);
                            // Remove flag:
                            parentNode.removeChild(nextSibling);
                        };
                    });
                    return sort.call(this, comparator).each(function (i) {
                        placements[i].call(getSortable.call(this));
                    });
                };
            })();
        $(document).ready(function () {
            var price_sort=1;
            $('#price_sort').click(function () {
               if(price_sort==1){
                   price_sort=2
                   $('.fabricator_material').sortElements(function(a, b){
                       return parseInt($(a).attr("data-price")) > parseInt($(b).attr("data-price")) ? 1 : -1;
                   });
               } else {
                   price_sort=1
                   $('.fabricator_material').sortElements(function(a, b){
                       return parseInt($(a).attr("data-price")) < parseInt($(b).attr("data-price")) ? 1 : -1;
                   });
               }
            });
            var name_sort=1;
            $('#name_sort').click(function () {
                if(name_sort==1){
                    name_sort=2;
                    $('.fabricator_material').sortElements(function(a, b){
                        return $(a).attr("data-name") >$(b).attr("data-name") ? 1 : -1;
                    });
                } else {
                    name_sort=1;
                    $('.fabricator_material').sortElements(function(a, b){
                        return $(a).attr("data-name") < $(b).attr("data-name") ? 1 : -1;
                    });
                }
            });
       var time = 300;
       $('.open_material').click(open_material);
       function open_material() {
           $('.hide_material').show();
       }
       $('.add-basket').click(add_basket);
       function add_basket() {
           $('#product').modal('hide');
           var plan = $('#data').attr("data-plan");
           var nomer = $('#data').attr("data-nomer");
           var table = $('#data').attr("data-table");
           var crop = $('#data').attr("data-crop");
           var material = $(this).attr("data-material");
           var price = $(this).attr("data-price");
           var name =$('#name_material_'+material).text();
           $.ajax({
               type : 'post',
               url : '/farmer/store-add-basket',
               data : {
                   'plan' :  plan,
                   'nomer' : nomer,
                   'table' : table,
                   'crop' : crop,
                   'material' : material,
                   'price' : price
               },
               response : 'text',
               success : function(html) {
                   $('#new_material_'+plan+'_'+nomer).val(name);
                   $('#store_nt1').show(time);
                   $('#store_nt2').hide(time);
                   $('#store_btn_nt2').hide(time);
               }
           });
       }
       $('.fabricator_open').click(open_fabricator);
       function open_fabricator() {
           var id = $(this).attr('id');
           var text = $(this).attr('title');
           var img=$(this).attr('src')
           $('.logo-fabricator-block').hide(time);
           $('.store-material').show(time);
           $('.fb_'+id).show(time);
           $('#store_btn_nt2').show(time);
           $('#store_btn_nt2 h3').text(text);
           if(img){
               $('#fab_big_logo').show();
               $('#fab_big_logo').attr('src', img);
           }
       }
        $('#store_btn_nt2, #store_btn_nt1').click(close_material);
       function close_material() {
           $('.logo-fabricator-block').show(time);
           $('.store-material').hide(time);
           $('.fabricator_material').hide(time);
           $('#store_btn_nt2').hide(time);
           $('#fab_big_logo').hide(time);
       }
       $('.open_material').keyup(open_material);
       function open_material() {
           $('#product').modal('show');
           var id=$(this).attr('data-id');
           var name=$(this).attr('data-material_name');
           var company_name=$(this).attr('data-open_company_name');
           var fabricator=$(this).attr('data-fabricator');
           var material_qty=$(this).attr('data-material_qty');
           var material_price=$(this).attr('data-material_price');
           var price_two=$(this).attr('data-price_two');
           var description=$(this).attr('data-description');
           $('#open_matrial_name').text(name);
           $('#open_company_name').text(company_name);
           $('#open_fabricator').text(fabricator);
           $('#open_material_qty').text(material_qty);
           var open_price=parseFloat(material_qty)*parseFloat(material_price);
           var open_price_two=parseFloat(material_qty)*parseFloat(price_two);
           $('#open_price').text(open_price+" грн/га");
           $('#open_price_two').text(open_price_two+"  грн/га");
           $('.add-basket').attr('data-material', id);
       }
    });
</script>