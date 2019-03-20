/**
 *
 * HTML5 Image uploader with Jcrop
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */


// update info by cropping (onChange and onSelect events handler)
function updateInfo(e) {
    $('#x1').val(e.x);
    $('#y1').val(e.y);
    $('#x2').val(e.x2);
    $('#y2').val(e.y2);
}
;

function fileSelectHandler(img,view) {
    // console.log($("#"+img).parent(".tpl-form-file-img"));
    // get selected file
    var oFile = $('#'+img)[0].files[0];

    if(typeof oFile == 'undefined'){
        return;
    }

    // hide all errors
    // $('.error').hide();

    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg|image\/png|image\/jpg)$/i;
    if (!rFilter.test(oFile.type)) {
        $('.error').html('请选择jpg、jpeg或png格式的图片').show();
        return;
    }

    // check for file size
    if (oFile.size > 5 * 1000 * 1024) {
        $('.error').html('请上传小于5M的图片').show();
        return;
    }

    // preview element
    var oImage = document.getElementById(view);

    // prepare HTML5 FileReader
    var oReader = new FileReader();

    oReader.onload = function(e) {
        $(".jcrop-holder img").attr("src",e.target.result) //这里就是直接操作的Jcrop

        // Create variables (in this scope) to hold the Jcrop API and image size
        var jcrop_api, boundx, boundy;

        // e.target.result contains the DataURL which we can use as a source of the image
        oImage.src = e.target.result;
        oImage.onload = function() { // onload event handler

            // destroy Jcrop if it is existed
            if (typeof jcrop_api != 'undefined'){
                jcrop_api.destroy();
            }


            // initialize Jcrop
            $('#'+view).Jcrop({
                minSize: [32, 32], // min crop size
                aspectRatio: 0, // 选框宽高比。说明：width/height
                bgFade: true, // use fade effect
                bgOpacity: .3, // fade opacity
                onChange: updateInfo,
                onSelect: updateInfo,
            }, function() {
                // use the Jcrop API to get the real image size
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];
                // Store the Jcrop API in the jcrop_api variable
                jcrop_api = this;
            });
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}