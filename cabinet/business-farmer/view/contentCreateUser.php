<div class="box">
    <div class="box-header">
        <h3 class="box-title">create administrator</h3>
    </div>
    <div class="box-body">
        <form action="/business-farmer/save_user" method="post">
            <?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user']?>
            <br><br>
            <label>Create an administrator password</label>
            <input type="password" name="password" class="form-control">
            <br>
            <label>Confirm password</label>
            <input type="password" name="password2" class="form-control">
            <br>
            <button type="submit" class="btn btn-success btn-block">create</button>
        </form>
    </div>
</div>