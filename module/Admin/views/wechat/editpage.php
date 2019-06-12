<?php
echo $this->render('../common/_layout');

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<?php $this->beginBody(); ?>
    <div class="container-fluid am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                <div class="page-header-heading"><span class="am-icon-edit page-header-heading-icon"></span> 编辑模板页面
                    <small>Edit page</small>
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
                    <!--<div class="widget-head am-cf">
                        <div class="widget-title am-fl">边框表单</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>-->
                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" id="form1" enctype="multipart/form-data">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="title" placeholder="请输入标题文字">
                                    <small>请填写标题文字10-20字左右。</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">发布时间 <span class="tpl-form-line-small-title">Time</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="am-form-field tpl-form-no-bg" name="time" placeholder="发布时间" data-am-datepicker="" readonly="">
                                    <small>发布时间为必填</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">作者 <span class="tpl-form-line-small-title">Author</span></label>
                                <div class="am-u-sm-9">
                                    <select data-am-selected="{searchBox: 1}" name="author" style="display: none;">
                                        <option value="The.CC">The.CC</option>
                                        <option value="夕风色">夕风色</option>
                                        <option value="Orange">Orange</option>
                                    </select>

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">SEO关键字 <span class="tpl-form-line-small-title">SEO</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="seo" placeholder="输入SEO关键字">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
                                            <img src="assets/img/a5.png" alt="" id="titleImg">
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                        <input id="doc-form-file" type="file" name="image">
                                    </div>

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">添加分类 <span class="tpl-form-line-small-title">Type</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="user-weibo" name="type" placeholder="请添加分类用点号隔开">
                                    <div>

                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">隐藏文章</label>
                                <div class="am-u-sm-9">
                                    <div class="tpl-switch">
                                        <input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" name="checkbox" checked="">
                                        <div class="tpl-switch-btn-view">
                                            <div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" rows="10" id="user-intro" name="info" placeholder="请输入文章内容"></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success" onclick="submitForm('form1')" >提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $this->endBody() ?>

    <script>
        /**
         * 表单提交
         * @param formId
         */
        function submitForm(formId){
            //表单中没有图片的简易ajax
            /*$.post(
                "wechat/editpage-ajax",
                $('#'+formId).serialize(),
                function(data){
                    console.log(data);
                },
                "json"
            );*/

            //表单中有图片的ajax
            $.ajax({
                url: "<?= yii\helpers\Url::to(['wechat/editpage-ajax']) ?>",
                type: 'POST',
                data: new FormData($('#'+formId)[0]),
                processData: false,
                contentType: false,
                dataType:"json",
                success : function(data) {
                    console.log(data);
                    $("#titleImg").attr('src',data)
                }
            });
        }
    </script>

<?php $this->endPage() ?>