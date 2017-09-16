<section class="content">
    <div class="row">
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
<!--                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>-->
                <li class="active"><a href="#settings" data-toggle="tab" style="font-size: 12px;"><?=$language['farmer']['114']?></a></li>
                <li><a href="#timeline" data-toggle="tab"><?=$language['farmer']['105']?></a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="activity">



                </div>
                <!-- /.tab-pane -->
                <div class=" tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-envelope bg-blue"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs">Read more</a>
                                    <a class="btn btn-danger btn-xs">Delete</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-user bg-aqua"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-comments bg-yellow"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                    Take me to your leader!
                                    Switzerland is small and neutral!
                                    We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-camera bg-purple"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->
                <!--</?=$language['farmer']['104']?>-->
                <div class="active tab-pane" id="settings">
                    <form method="post" action="/farmer/profile/save" class="form-horizontal">
                        <div class="form-group">
                            <label for="company_name" class="col-sm-4 control-label"><?=$language['farmer']['106']?></label>

                            <div class="col-sm-6">
                                <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Назва" value="<?php echo $date[1][0]['company_name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="specialization" class="col-sm-4 control-label"><?=$language['farmer']['107']?></label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="specialization" id="specialization" placeholder="Cпеціалізація" value="<?php echo $date[1][0]['specialization'];?>">
                            </div>
                        </div>
                        <div id="region_in" class="form-group ">
                            <label for="region" class="col-sm-4 control-label"><?=$language['farmer']['108']?></label>

                            <div class="col-sm-6">
                                <input class="form-control select2 has-warning" id="region" style="width: 100%;" list="region_list" value="<?php echo $date[1][0]['areas'];?>." required>
                                <datalist id="region_list">
                                    <?php foreach ($date[2] as $region){?>
                                    <option id="<?php echo $region['id']?>" data-zona="<?php echo $region['zona']?>" value="<?php echo $region['areas']?>"><?php echo $region['region']?></option>
                                    <?php }?>
                                </datalist>
                            </div>
                        </div>
                        <input type="hidden" name="region" id="region_val" value="" required>
                        <input type="hidden" name="zona" id="region_zona" value="" required>
                        <script>
                            $(document).ready(function () {
                                $(window).ready(region(1));
                                $('#region').keyup(region);
                                $("#region").on('input', region);
                                function region(dl){
                                    var valueText = $('#region').val();
                                    if(dl==1) valueText = valueText.substring(0, valueText.length - 1);

                                    $("#region_list").find("option").each(function() {
                                        if($('[value="'+valueText+'"]').length) {
                                            var id = $('[value="'+valueText+'"]').attr( "id");
                                            var zona = $('[value="'+valueText+'"]').attr( "data-zona");
                                            $('#region_in').removeClass( "has-error" );
                                            $('#region_val').val(id);
                                            $('#region_zona').val(zona);
                                        }else {
                                            $('#region_in').addClass( "has-error" );
                                            $('#region_val').val("");
                                            $('#region_zona').val("");
                                        };
                                    });
                                };
                            });
                        </script>
                        <div class="form-group">
                            <label for="address" class="col-sm-4 control-label"><?=$language['farmer']['109']?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Адреса" value="<?php echo $date[1][0]['address'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label"><?=$language['farmer']['110']?></label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Ім'я" value="<?php echo $date[1][0]['name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-4 control-label"><?=$language['farmer']['111']?></label>
                            <div class="col-sm-6">
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Прізвище" value="<?php echo $date[1][0]['last_name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position" class="col-sm-4 control-label"><?=$language['farmer']['112']?></label>
                            <div class="col-sm-6">
                                <input type="text" name="position" class="form-control" id="position" placeholder="Посада" value="<?php echo $date[1][0]['position'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-4 control-label"><?=$language['farmer']['113']?></label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?php echo $date[1][0]['phone'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" class="btn btn-success"><?=$language['farmer']['15']?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    </div>

</section>
