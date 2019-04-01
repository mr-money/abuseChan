$(function () {
    var tabCounter = 0;
    var $tab = $('#admin-doc-tab');
    var $nav = $tab.find('.am-tabs-nav');
    var $bd = $tab.find('.am-tabs-bd');

    function addTab() {
        var nav = '<li><span class="am-icon-close"></span>' +
            '<a href="javascript: void(0)">标签 ' + tabCounter + '</a></li>';
        var content = '<div class="am-tab-panel">动态插入的标签内容' + tabCounter + '</div>';

        $nav.append(nav);
        $bd.append(content);
        tabCounter++;

        $tab.tabs('refresh');
    }

    // 动态添加标签页
    $('.js-append-tab').on('click', function () {
        addTab();
    });

    // 移除标签页
    $nav.on('click', '.am-icon-close', function () {
        var $item = $(this).closest('li');
        var index = $nav.children('li').index($item);

        $item.remove();
        $bd.find('.am-tab-panel').eq(index).remove();

        $tab.tabs('open', index > 0 ? index - 1 : index + 1);
        $tab.tabs('refresh');
    });

    // var progress = $.AMUI.progress;
    progress.done();//跳转进度结束
});

/**
 * 使用modal模拟alert
 * @param message = string
 * @param title = false
 * @param func = function
 */
function myAlert(message, title, func) {
    //title默认值
    title = typeof title !== 'undefined' ? title : '骂骂酱问你';

    //清空容器
    $("#amazeui-modal-my-alert").remove();

    var html = "<div class='am-modal am-modal-alert amazeui-am-modal-alert' tabindex='-1' id='amazeui-modal-my-alert'> " +
        "<div class='am-modal-dialog'> " +
        "<div class='am-modal-hd'>" + title + "</div> " +
        "<div class='am-modal-bd my-alert-message'>" + message + "</div> " +
        "<div class='am-modal-footer'> " +
        "<span class='am-modal-btn'>确定</span> " +
        "</div> " +
        "</div>" +
        "</div>";

    $("body").append(html);
    $("#amazeui-modal-my-alert").find(".am-modal-btn").click(func)

    $("#amazeui-modal-my-alert").modal('open');

}

/**
 * 使用modal模拟confirm
 * @param message
 * @param onConfirm 点击确定后的function
 * @param onCancel 点击取消后的function
 * @param title
 */
function myConfirm(message, onConfirm, onCancel, title) {
    //title默认值
    title = typeof title !== 'undefined' ? title : '骂骂酱问你';

    //清空容器
    $("#amazeui-modal-my-confirm").remove();

    var html = "<div class='am-modal am-modal-confirm amazeui-am-modal-confirm' tabindex='-1' id='amazeui-modal-my-confirm'> " +
        "<div class='am-modal-dialog'> " +
        "<div class='am-modal-hd'>" + title + "</div> " +
        "<div class='am-modal-bd message'>" + message + "</div> " +
        "<div class='am-modal-footer'> " +
        "<span class='am-modal-btn' data-am-modal-confirm>确定</span> " +
        "<span class='am-modal-btn' data-am-modal-cancel>取消</span> " +
        "</div> " +
        "</div> " +
        "</div>";

    $("body").append(html);

    $("#amazeui-modal-my-confirm").modal({
        relatedTarget: this,
        onConfirm: onConfirm,
        // closeOnConfirm: false,
        onCancel: onCancel
    });

    $("#amazeui-modal-my-confirm").modal('open');

}

//点击外部链接 新建跳转iframe
function iframeRedirect(title, url) {
    //跳转进度
    var progress = $.AMUI.progress;
    progress.start();

    var $tab = $('#admin-doc-tab');
    var $nav = $tab.find('.am-tabs-nav');
    var $bd = $tab.find('.am-tabs-bd');

    var nav = '<li>' +
        '<span class="am-icon-close"></span>' +
        '<a href="javascript: void(0)">' + title + '</a>' +
        '</li>';
    var content = '<div class="am-tab-panel">' +
        "<iframe src='" + url + "' frameborder='0'></iframe>" +
        '</div>';

    $nav.append(nav);
    $bd.append(content);
    $tab.tabs('refresh');
    var index = $nav.children('li').length;

    $tab.tabs('open', index - 1);
    $tab.tabs('refresh');

    var iframes = document.getElementsByTagName('iframe');

    for (var i = 0, j = iframes.length; i < j; ++i) {
        // 放在闭包中，防止iframe触发load事件的时候下标不匹配
        (function (_i) {
            iframes[_i].onload = function () {
                this.contentWindow.onbeforeunload = function () {
                    iframes[_i].style.visibility = 'hidden';
                    // iframes[_i].style.display = 'none';

                    iframes[_i].setAttribute('height', 'auto');
                };

                this.setAttribute('height', this.contentWindow.document.body.scrollHeight);

                this.style.visibility = 'visible';
                // this.style.display = 'block';
            };
        })(i);
    }

    progress.done();//跳转进度结束
}

//刷新框架页面
var progress = parent.$.AMUI.progress;
function refreshIframe() {
    progress.start();
    location.reload();
}