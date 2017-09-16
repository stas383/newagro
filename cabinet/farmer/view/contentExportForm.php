<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 04.08.2017
 * Time: 16:34
 */
?>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Export</h3>
        </div>
        <div class="box-body">
            <form enctype="multipart/form-data" method="post" action="/farmer/save_export_form">
                    <label for="exampleInputFile">XML form 1,2</label>
                    <input type="file" id="exampleInputFile" name="xml">
                <br>
                <button type="submit" class="btn">send</button>

            </form>
        </div>
    </div>
</section>
