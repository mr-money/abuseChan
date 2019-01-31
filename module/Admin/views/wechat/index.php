<?php  echo $this->render('../common/_layout'); ?>

<?php $this->beginBody() ?>
<body data-type="index">
<!--<script src="assets/js/theme.js"></script>-->
<div class="am-g tpl-g">
    <!-- 头部 -->
    <?= $this->render('../common/_header'); ?>

    <!-- 风格切换 -->
    <?= $this->render('../common/_skiner'); ?>

    <!-- 侧边导航栏 -->
    <?= $this->render('../common/_navBar',array('admin'=>$admin,'adminMenu'=>$this->params['adminMenu'])); ?>

    <!-- 内容区域 框架形式显示-->
    <div class="tpl-content-wrapper">
        <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="doc-tab-demo-1">
            <ul class="am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="javascript: void(0)">首页</a></li>
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                    <iframe src="<?= \yii\helpers\Url::to(['wechat/home']); ?>" id="admin-index-content-iframe" frameborder="0"></iframe>
                </div>

            </div>
        </div>
        <br />
        <button type="button" class="am-btn am-btn-primary js-append-tab">插入 Tab</button>
    </div>

</div>
<!--<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/amazeui.datatables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/app.js"></script>-->

</body>
<?php $this->endBody() ?>

</html>

<script>
    //退出登录
    function logout() {
        myConfirm('确定退出吗',function () {
            $.post(
                "<?= \yii\helpers\Url::to(['wechat/logout-ajax']); ?>",
                {

                },
                function(data){
//                    console.log(data);
                    if(data.status == 1000){
                        location.reload();
                        return;
                    }
                },
                "json"
            );
        });

    }
</script>

<?php $this->endPage() ?>

