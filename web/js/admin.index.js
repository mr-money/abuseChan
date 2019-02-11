$(function() {
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
    $('.js-append-tab').on('click', function() {
        addTab();
    });

    // 移除标签页
    $nav.on('click', '.am-icon-close', function() {
        var $item = $(this).closest('li');
        var index = $nav.children('li').index($item);

        $item.remove();
        $bd.find('.am-tab-panel').eq(index).remove();

        $tab.tabs('open', index > 0 ? index - 1 : index + 1);
        $tab.tabs('refresh');
    });



    //frame自适应高度
    var iframes = document.getElementsByTagName('iframe');

    for (var i = 0, j = iframes.length; i < j; ++i) {
        // 放在闭包中，防止iframe触发load事件的时候下标不匹配
        (function(_i) {
            iframes[_i].onload = function() {
                this.contentWindow.onbeforeunload = function() {
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

    //点击外部链接 新建跳转iframe
    function iframeRedirect(title,url) {
        var nav = '<li>' +
                    '<span class="am-icon-close"></span>' +
                    '<a href="javascript: void(0)">' + title + '</a>' +
                '</li>';
        var content = '<div class="am-tab-panel am-active">' +
                        "<iframe src='"+ url +"' frameborder='0'></iframe>" +
                    '</div>';

        $(".am-tab-panel").removeClass('am-active');

        $nav.append(nav);
        $bd.append(content);
        tabCounter++;
        $tab.tabs('refresh');
    }
});