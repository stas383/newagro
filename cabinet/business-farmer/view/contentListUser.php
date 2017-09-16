<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Користувачі</h3>
            <div class="box-tools">
                <a class="btn btn-success" href="#createUser" data-toggle="modal">create user</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>last name</th>
                        <th>Посада</th>
                        <th>access</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($date['user'] as $user){?>
                     <tr>
                         <td><?=$user['name'] ?></td>
                         <td><?=$user['last_name'] ?></td>
                         <td><?=$date['position'][SRC::validator($_COOKIE['lang'])][$user['position']] ?></td>
                         <td><?if($user['access']=='admin') echo 'admin'; else{
                                 $access[$user['id_user_b']]=explode(',',$user['access']);
                                 $access_user='';
                                 foreach ($access[$user['id_user_b']] as $arr_access){
                                      $access_user.=$date['access'][SRC::validator($_COOKIE['lang'])][$arr_access].', ';
                                 }
                                 echo $access_user=substr($access_user, 0, -2);
                             }?>
                         </td>
                         <td><a class="btn btn-warning fa fa-pencil edit_open" data-data='<?=json_encode($user)?>'></a></td>
                     </tr>
                   <? }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="createUser" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/business-farmer/create_user">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create user</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="cr_name"></label>
                            <input type="text" id="cr_name" name="name" class="form-control">
                            <br>
                            <label for="cr_position">Посада</label>
                            <select class="form-control" name="position" id="cr_position">
                                <?php foreach ($date['position'][SRC::validator($_COOKIE['lang'])] as $id_position=>$position){ ?>
                                <option value="<?=$id_position?>"><?=$position?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="cr_last_name">last name</label>
                            <input type="text" id="cr_last_name" name="last_name" class="form-control">
                            <br>
                            <label for="cr_password">password</label>
                            <input type="password" id="cr_password" name="password" class="form-control">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <label>access</label>
                            <div class="row">
                                <? foreach ($date['access'][SRC::validator($_COOKIE['lang'])] as $id_access=>$access){?>
                                    <div class="col-lg-4">
                                        <div class="checkbox">
                                            <label>
                                                <input name="access[]" value="<?=$id_access?>" type="checkbox">
                                                <?=$access?>
                                            </label>
                                        </div>
                                    </div>
                                <? }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primaryn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="editUser" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/business-farmer/edit_user">
                <input type="hidden" name="b_id_user" id="ed_b_id_user">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit user</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="ed_name">name</label>
                            <input type="text" id="ed_name" name="name" class="form-control">
                            <br>
                            <label for="ed_position">position</label>
                            <select class="form-control" name="position" id="ed_position">
                                <?php foreach ($date['position'][SRC::validator($_COOKIE['lang'])] as $id_position=>$position){ ?>
                                    <option value="<?=$id_position?>"><?=$position?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="ed_last_name">last name</label>
                            <input type="text" id="ed_last_name" name="last_name" class="form-control">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <label>access</label>
                            <div class="row">
                                <? foreach ($date['access'][SRC::validator($_COOKIE['lang'])] as $id_access=>$access){?>
                                    <div class="col-lg-4">
                                        <div class="checkbox">
                                            <label>
                                                <input class="checkbox" name="access[]" value="<?=$id_access?>" type="checkbox">
                                                <?=$access?>
                                            </label>
                                        </div>
                                    </div>
                                <? }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primaryn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.edit_open').click(edit_open);
        function edit_open() {
            var data_json = $(this).attr('data-data');
            var data = JSON.parse(data_json);
            $('#editUser').modal('show');
            $('#ed_b_id_user').val(data['id_user_b']);
            $('#ed_name').val(data['name']);
            $('#ed_position').val(data['position']);
            $('#ed_last_name').val(data['last_name']);
            var access= data['access'].split(/\s*,\s*/);
            $('.checkbox:checked').prop('checked', false);
            $.each (access, function (key, value) {
                $(".checkbox[value='"+value+"']").attr('checked',true)
            });
        }
    });
</script>