<p class="login-box-msg">Авторизуйтесь для початку роботи</p>
<table class="table box">
    <tbody>
    <?foreach ($date['user'] as $user){?>
        <tr>
            <td><?=$user['name']?> <?=$user['last_name']?></td>
            <td><a class="enter" data-data='<?=json_encode($user);?>' href="#login_on" data-toggle="modal">enter</a></td>
        </tr>
    <?}?>
    </tbody>
</table>
<div id="login_on" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content wt">
            <form method="post" action="/business-farmer/login_on">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form action="/business-farmer/login_on" method="post">
                        <label id="last_name"></label>
                        <br><br>
                        <input id="id_user_b" name="id_user_b" type="hidden">
                        <input type="password" name="password" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-success btn-block">enter</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.enter').click(login_on);
        function login_on() {
            var json_user=$(this).attr('data-data');
            var user=JSON.parse(json_user);
            $('#last_name').text(user['name']+' '+user['last_name']);
            $('#id_user_b').val(user['id_user_b']);
        }
    });
</script>