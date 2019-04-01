<?php
echo $this->render('../common/_layout');
?>

<?php $this->beginBody(); ?>
<div class="container-fluid am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
            <div class="page-header-heading"><span class="am-icon-user page-header-heading-icon"></span> 账号设置
                <small>Admin Account Settings</small>
            </div>
            <p class="page-header-description">骂骂酱 一个能和你对骂的公众号</p>
        </div>
        <div class="am-u-lg-2 tpl-index-settings-button">
            <button type="button" class="page-header-button am-radius" onclick="refreshIframe()"><span
                        class="am-icon-refresh"></span>
            </button>
        </div>
    </div>

</div>
<div class="row-content am-cf">
    <div class="row am-cf">


    </div>
</div>

<!--图片裁剪框 end-->
<?php $this->endBody() ?>

<script>

</script>

<?php $this->endPage() ?>

