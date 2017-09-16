<section class="content">
       <div class="box">
           <div class="box-body">
           <table class="table">
               <thead>

               </thead>
               <tbody>
               <?php foreach ($date as $user){?>
                    <tr>
                        <td><?php echo $user['company_name']?></td>
                        <td><a href="/bank/open-user/<?php echo $user['id_user']?>">+</a></td>
                    </tr>
               <? } ?>
               </tbody>
           </table>
           </div>
       </div>
</section>
