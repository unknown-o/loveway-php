<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <!-- 卡片头部，包含头像、标题、副标题 -->

    <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
    <div class="mdui-card-media">
        <img style="max-height: 1000px" src="https://static.llilii.cn/images/kagamine/78688114_p0.png" />
    </div>

    <!-- 卡片的标题和副标题 -->
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><?php echo getInfo('more') ?></div>
        <div class="mdui-card-primary-subtitle">哇！终于等到你来看这个页面！</div>
    </div>

    <!-- 卡片的内容 -->
    <div class="mdui-card-content">
        <?php echo getInfo('more_content') ?>
    </div>
    <!--
        <div class="mdui-card-actions">
          <button class="mdui-btn mdui-btn-icon mdui-float-right">
            <i class="mdui-icon material-icons">share</i>
          </button>
          <button class="mdui-btn mdui-btn-icon mdui-float-right">
            <i class="mdui-icon material-icons">more</i>
          </button>
        </div>-->
</div>
<br /><br />