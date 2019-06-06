<?php
echo $this->render('../common/_layout');
$this->registerCsrfMetaTags();
?>

<?php $this->beginBody(); ?>
    <div class="container-fluid am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                <div class="page-header-heading"><span class="am-icon-user page-header-heading-icon"></span> 微信用户
                    <small>Wechat User List</small>
                </div>
                <p class="page-header-description"></p>
            </div>
            <div class="am-u-lg-3 tpl-index-settings-button">
                <button type="button" class="page-header-button am-radius" onclick="refreshIframe()"><span
                            class="am-icon-refresh"></span>
                </button>
            </div>
        </div>

    </div>
    <!-- 内容区域 -->
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">用户列表</div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                            <form action="" method="get" class="am-form am-form-inline">
                                <div class="am-form-group">
                                    <input type="text" class="am-form-field" placeholder="昵称" name="nickname"
                                           value="<?= Yii::$app->request->get('nickname'); ?>">
                                </div>

                                <div class="am-form-group">
                                    <input type="text" class="am-form-field" placeholder="电话" name="tel"
                                           value="<?= Yii::$app->request->get('tel'); ?>">
                                </div>

                                <div class="am-form-group">
                                    <button type="submit" class="am-btn am-btn-default am-btn-block" style="width: 6vw">
                                        <i class="am-icon-search"></i>搜索
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="am-u-sm-12">
                            <table width="100%"
                                   class="am-table am-table-striped am-table-compact am-table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>头像</th>
                                    <th>昵称</th>
                                    <th>电话</th>
                                    <th>地址</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($wxUser as $list) { ?>
                                    <tr class="">
                                        <td class="am-text-middle"><?= $list['id'] ?></td>
                                        <td>
                                            <img src="<?= $list['avatar'] ?>" class="tpl-table-line-img" alt="">
                                        </td>
                                        <td class="am-text-middle"><?= $list['nickname'] ?></td>
                                        <td class="am-text-middle"><?= $list['tel'] ?></td>
                                        <td class="am-text-middle"><?= $list['address'] ?></td>
                                        <td class="am-text-middle"><?= $list['create_at'] ?></td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:delUser('<?= $list['id']; ?>');"
                                                   class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <!-- more data -->
                                </tbody>
                            </table>
                        </div>
                        <div class="am-u-lg-12 am-cf">

                            <div class="am-fr">
                                <ul class="am-pagination tpl-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $this->endBody() ?>

    <script>
        function delUser(id) {
            myConfirm('确认删除吗', '', function () {
                //跳转进度
                var progress = $.AMUI.progress;
                progress.start();
                $.post(
                    "<?= \yii\helpers\Url::to(['wechat/del-user-ajax']); ?>",
                    {
                        id:id,
                    },
                    function(data){
                        // console.log(data);
                        progress.done();//跳转进度结束

                        //删除成功刷新页面
                        if(data.status == 1000){
                            location.reload();
                        }
                    },
                    "json"
                );
            })
        }
    </script>

<?php $this->endPage() ?>