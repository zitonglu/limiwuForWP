<!-- 分享对话框 -->
<div class="modal fade" id="myshare" tabindex="-1" role="dialog" aria-labelledby="myshare">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mythinks">享受分享的乐趣</h4>
            </div>
            <div class="modal-body">
                <?php if(is_single()||is_page()){ ?>
                <img src="http://api.qrserver.com/v1/create-qr-code/?size=256x256&amp;data=<?php echo get_permalink(); ?>" class="img-responsive center-block" alt="文章网址的二维码">
                <?php }else{ ?>
                <img src="http://api.qrserver.com/v1/create-qr-code/?size=256x256&amp;data=<?php echo home_url(); ?>" class="img-responsive center-block" alt="文章网址的二维码">
                <?php } ?>
                <p class="text-center weixin-share-p">打开微信，点击底部的“发现”，<br>使用“扫一扫”即可将网页分享至朋友圈</p>
                <?php echo get_option('limiwu_baidushare'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-dismiss="modal">关闭窗口</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myshang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">谢谢您的打赏</h4>
      </div>
      <div class="modal-body">
        <img src="<?php bloginfo('template_url'); ?>/images/shang.jpg" class="img-responsive center-block" alt="打赏图片">
        <p class="text-center weixin-share-p">打开微信，点击底部的“发现”，<br>使用“扫一扫”即可将请我喝可乐</p>
        <?php echo get_option('limiwu_baidushare'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-purple" data-dismiss="modal">关闭窗口</button>
      </div>
    </div>
  </div>
</div>