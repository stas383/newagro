/**
 * Created by Ivan on 05.04.2017.
 */
$(document).ready(function () {

    //Добавление строки матариалов
    $('#show_material').click(show_material);
    function show_material() {
        var material_show = $(this).attr('data-show');
        $('#add_material_'+material_show).show(200);
        material_show++;
        $(this).attr({'data-show':material_show});
        if(material_show==4){
            $(this).hide(200);
        }
    }

    //Выбор материалов в плане
    $('#material_select_1').click(material_select);
    $('#material_select_2').click(material_select);
    $('#material_select_3').click(material_select);
    function material_select() {
        var i = $(this).attr('id');
        var i = i[i.length-1];
        var sel  = $('#material_select_'+i).val();
        $('.material_selectyl_'+i).val(0)
        if(sel==0){
            $('.material_selectyl_'+i).prop('required', false);
        }
        if(sel!=0){
            $('.material_selectyl_'+i).prop('required', true);
            if(sel==1){
                $('.seeds_'+i).css({'display':'block'});
                $('.fertilizers_'+i+', .ppa_'+i).css({'display':'none'});
            }
            if(sel==2){
                $('.fertilizers_'+i).css({'display':'block'});
                $('.seeds_'+i+', .ppa_'+i).css({'display':'none'});
            }
            if(sel==3){
                $('.ppa_'+i).css({'display':'block'});
                $('.fertilizers_'+i+', .seeds_'+i).css({'display':'none'});
            }
        }
    }

    //выбор операции
    $('#id_action_type').click(action_select);
    function action_select() {
        $('#action_id').val(0);
        var id_action_type =$(this).val();
        $('.action_select').css({'display':'none'})
        $('.action_select'+id_action_type).css({'display':'block'});
    }

    $('.NumberOrder').change(NumberOrder);
    function NumberOrder() {
        var id = $(this).attr('data-id');
        var value = $(this).val();
        $.ajax({
            type : 'post',
            url : '/add-crop/save-number-order',
            data : {
                'id' :  id,
                'value' : value,
            },
            response : 'text',
            success : function(html) {
                $('#truy').hide(200);
                $('#truy').html(html);
                $('#truy').show(200);
                setTimeout(function() {
                    $('#truy').hide(200);
                }, 1000);
            }
        });

    }
    //Парные операции
    $('.ParentOper').change(ParentOper);
    function ParentOper() {
        var id = $(this).attr('data-id');
        var parent = $(this).val();
        $.ajax({
            type : 'post',
            url : '/add-crop/save-parent-oper',
            data : {
                'id' :  id,
                'parent' : parent,
            },
            response : 'text',
            success : function(html) {
                $('#truy').hide(200);
                $('#truy').html(html);
                $('#truy').show(200);
                setTimeout(function() {
                    $('#truy').hide(200);
                }, 1000);
            }
        });

    }
});