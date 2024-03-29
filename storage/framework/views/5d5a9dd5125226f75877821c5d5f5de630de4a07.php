<?php $__env->startSection('title', trans('messages.display.display')); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/w3css.css')); ?>">
<?php $__env->startSection('content'); ?>

    <div id="callarea" class="row" style="line-height:1.23">
        <div class="col m4">
                <div class="card-panel center-align w3-text-teal">
                    <h5>Antrian Sedang Dilayani</h5>
                </div>
            <div class="card-panel center-align" style="margin-bottom:0">
                <div style="border-bottom:1px solid #ddd">
                    <span id="num1" style="font-size:70px;font-weight:bold;line-height:1.45"><?php echo e($data[1]['number']); ?></span><br>
                    <small id="cou1" style="font-size:30px"><?php echo e($data[1]['counter']); ?></small>
                </div>
                <div style="border-bottom:1px solid #ddd">
                    <span id="num2" style="font-size:70px; font-weight:bold;line-height:1.45"><?php echo e($data[2]['number']); ?></span><br>
                    <small id="cou2" style="font-size:30px"><?php echo e($data[2]['counter']); ?></small>
                </div>
                <div style="border-bottom:1px solid #ddd">
                    <span id="num3" style="font-size:70px;font-weight:bold;line-height:1.45"><?php echo e($data[3]['number']); ?></span><br>
                    <small id="cou3" style="font-size:30px"><?php echo e($data[3]['counter']); ?></small>
                </div>
            </div>
        </div>
        <div class="col m8">
            <div class="card-panel center-align w3-text-teal">
                <h5>Antrian Terpanggil</h5>
            </div>
            <div class="card-panel center-align" style="margin-bottom:0">
                <span style="font-size:40px"><?php echo e(trans('messages.display.token')); ?></span><br>
                <span class=" w3-text-orange" id="num0" style="font-size:130px;font-weight:bold;line-height:1.5"><?php echo e($data[0]['number']); ?></span><br>
                <span style="font-size:40px"><?php echo e(trans('messages.display.please')); ?> <?php echo e(trans('messages.display.proceed_to')); ?></span><br>
                <span class=" w3-text-orange" id="cou0" style="font-size:80px; line-height:1.5"><?php echo e($data[0]['counter']); ?></span>
            </div>
        </div>
    </div>
    <div class="row " style="margin-bottom:0;font-size:<?php echo e($settings->size); ?>px;color:<?php echo e($settings->color); ?>">
        <marquee><?php echo e($settings->notification); ?></marquee>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/voice.min.js')); ?>"></script>
    <script>
        $(function() {
            $('#main').css({'min-height': $(window).height()-114+'px'});
        });
        $(window).resize(function() {
            $('#main').css({'min-height': $(window).height()-114+'px'});
        });

        (function($){
            $.extend({
                playSound: function(){
                  return $("<embed src='"+arguments[0]+".mp3' hidden='true' autostart='true' loop='false' class='playSound'>" + "<audio autoplay='autoplay' style='display:none;' controls='controls'><source src='"+arguments[0]+".mp3' /><source src='"+arguments[0]+".ogg' /></audio>").appendTo('body');
                }
            });
        })(jQuery);

        function checkcall() {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('assets/files/display')); ?>",
                cache: false,
                success: function(response) {
                    s = JSON.parse(response);
                    if (curr!=s[0].call_id) {
                        $("#callarea").fadeOut(function(){
                            $('#num0').html(s[0].number);
                            $("#cou0").html(s[0].counter);
                            $('#num1').html(s[1].number);
                            $("#cou1").html(s[1].counter);
                            $('#num2').html(s[2].number);
                            $("#cou2").html(s[2].counter);
                            $('#num3').html(s[3].number);
                            $("#cou3").html(s[3].counter);
                        });
                        $("#callarea").fadeIn();
                        if (curr!=0) {
                            var bleep = new Audio();
                            bleep.src = '<?php echo e(url('assets/sound/sound1.mp3')); ?>';
                            bleep.play();

                            window.setTimeout(function() {
                                msg1 = '<?php echo trans('messages.display.token'); ?> '+s[0].call_number+' <?php echo trans('messages.display.please'); ?> <?php echo trans('messages.display.proceed_to'); ?> '+s[0].counter;
                                responsiveVoice.speak(msg1, "<?php echo e($settings->language->display); ?>", {rate: 0.85});
                            }, 800);
                        }
                        curr = s[0].call_id;
                    }
                }
            });
        }

        window.setInterval(function() {
            checkcall();
        }, 3000);

        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('assets/files/display')); ?>",
                cache: false,
                success: function(response) {
                    s = JSON.parse(response);
                    curr = s[0].call_id;
                }
            });
            checkcall();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainappqueue', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>