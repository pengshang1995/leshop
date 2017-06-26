/**
 * Created by PS on 2017/6/26.
 */
$(function () {
    $(".size_right .right_form:not(:first)").css("display", "none")
    $(".size_left h3:first span").css({"color": "#fff", "background": "url(res/clothing_sizes_files/baidu_select_bg2.gif) no-repeat"});
    $(".size_left h3 span").each(function () {
        $(this).click(function () {
            var idnum = $(this).attr("id");
            $(".size_right .right_form").slideUp(500)
            $(".size_right .right_form").eq(idnum - 1).slideDown(500)
            $(".size_left h3 span").css({"color": "#2f2e2e", "background": "url(res/clothing_sizes_files/baidu_select_bg1.gif) no-repeat"});
            $(".size_left ul li").css({"color": "#2f2e2e", "background-color": "#fff"});
            $(this).css({"color": "#fff", "background": "url(res/clothing_sizes_files/baidu_select_bg2.gif) no-repeat"});
            $("input[type='text']").val("");
        })
    })
    $(".size_left ul li").each(function () {
        $(this).click(function () {
            var idnum = $(this).attr("id");
            $(".size_right .right_form").slideUp(500)
            $(".size_right .right_form").eq(idnum - 1).slideDown(500)
            $(".size_left h3 span").css({"color": "#2f2e2e", "background": "url(res/clothing_sizes_files/baidu_select_bg1.gif) no-repeat"});
            $(".size_left ul li").css({"color": "#2f2e2e", "background-color": "#fff"});
            $(this).css({"color": "#fff", "background-color": "#7ea30d"});
            $("input[type='text']").val("");
        })
    })

    for (var i = 3; i < 16; i++) {
        $(".right" + i + " input").keypress(function (event) {
            var keyCode = event.which;
            if (keyCode == 46 || (keyCode >= 48 && keyCode <= 57) || keyCode == 8 || keyCode == 9 || keyCode == 13)
                return true;
            else
                return false;
        });
    }

    for (var ci = 3; ci < 16; ci++) {
        var t1 = ".right" + ci.toString() + ".right_same.right_form button";

        $(t1).eq(0).click(function (i) {
            return function () {
                var t2 = ".right" + i.toString() + ".right_same.right_form input[type='text']";
                if ($(t2).eq(0).val() == "" || $(t2).eq(1).val() == "" || isNaN($(t2).eq(0).val()) || isNaN($(t2).eq(1).val())) {
                    alert("璇疯緭鍏ユ湁鏁堢殑鏁版嵁");
                    $(t2).eq(2).val("");
                    return;
                }

                $(t2).eq(2).val(calSize($(t2).eq(0).val(), $(t2).eq(1).val(), i));

            };
        }(ci));
    }
})


function calSize(height, wight, ci) {
//ci:3-6 濂宠  ci:7-10 鐢疯  ci:11-14 绔ヨ ci:15 鏂囪兏
    var size;
    var sarr = new Array();
    if (ci >= 3 && ci <= 6) {
//1-S,2-M,3-L,4-XS,5-XL,6-XXL
        sarr = ["S", 80, 99, 145, 149, "S", 90, 99, 150, 169, "S", 80, 89, 160, 169, "M", 80, 99, 170, 172, "M", 90, 99, 173, 175, "M", 100, 109, 145, 149, "M", 100, 109, 155, 179, "L", 110, 119, 145, 149, "L", 110, 119, 155, 179, "L", 120, 129, 155, 159, "L", 120, 129, 170, 179, "XS", 80, 89, 150, 159, "XL", 110, 119, 150, 154, "XL", 120, 129, 145, 154, "XL", 120, 129, 160, 169, "XL", 130, 139, 160, 179, "XL", 140, 149, 173, 179, "XXL", 130, 139, 150, 159, "XXL", 140, 149, 155, 172];

    }
    else if (ci <= 10) {
        sarr = [44, 85, 115, 153, 163, 44, 85, 105, 163, 168, 44, 85, 95, 168, 173, 46, 115, 135, 153, 163, 46, 135, 145, 153, 158, 46, 105, 125, 163, 168, 46, 95, 115, 168, 173, 46, 95, 105, 173, 178, 48, 145, 165, 153, 158, 48, 135, 155, 158, 163, 48, 125, 145, 163, 168, 48, 115, 145, 168, 173, 48, 105, 125, 173, 178, 48, 105, 115, 178, 183, 50, 165, 185, 153, 158, 50, 155, 175, 158, 163, 50, 145, 165, 163, 168, 50, 145, 155, 168, 173, 50, 125, 155, 173, 178, 50, 115, 135, 178, 183, 50, 115, 125, 183, 188, 52, 175, 195, 158, 163, 52, 165, 185, 163, 168, 52, 155, 175, 168, 173, 52, 155, 165, 173, 183, 52, 135, 155, 178, 183, 52, 125, 145, 183, 188, 52, 125, 135, 188, 193, 54, 185, 195, 163, 173, 54, 175, 185, 168, 178, 54, 165, 175, 173, 188, 54, 145, 165, 183, 188, 54, 135, 155, 188, 193, 56, 195, 215, 168, 183, 56, 185, 195, 173, 193, 56, 175, 185, 178, 193, 56, 155, 175, 188, 193, 58, 195, 215, 183, 193];

    }
    else if (ci <= 14) {
        sarr = [59, 6, 11, 55, 62, 66, 12, 14, 55, 62, 66, 8, 16, 63, 69, 73, 17, 20, 63, 69, 73, 12, 20, 70, 76, 80, 21, 24, 70, 76, 80, 16, 24, 77, 83, 90, 23, 28, 77, 83, 90, 20, 30, 84, 94, 100, 31, 36, 84, 94, 100, 22, 38, 95, 104, 110, 39, 44, 95, 104, 110, 26, 42, 105, 114, 120, 43, 52, 105, 114, 120, 34, 52, 115, 124, 130, 53, 60, 115, 124, 130, 40, 60, 125, 134, 140, 61, 80, 125, 134, 140, 52, 76, 135, 144, 150, 77, 90, 135, 144, 150, 70, 84, 145, 154, 160, 85, 100, 145, 154, 160, 80, 110, 155, 164, 165, 111, 130, 155, 164];
    }
    else if (ci == 15) {
        sarr = ["32/70A", 68, 72, 80, 82, "32/70B", 68, 72, 83, 84, "32/70C", 68, 72, 85, 87, "32/70D", 68, 72, 88, 88, "34/75A", 73, 77, 85, 87, "34/75B", 73, 77, 88, 89, "34/75C", 73, 77, 90, 94, "34/75D", 73, 77, 95, 97, "34/75E", 73, 77, 98, 98, "36/80A", 78, 82, 90, 92, "36/80B", 78, 82, 93, 94, "36/80C", 78, 82, 95, 97, "36/80D", 78, 82, 98, 102, "36/80E", 78, 82, 103, 103, "38/85A", 83, 87, 95, 97, "38/85B", 83, 87, 99, 101, "38/85C", 83, 87, 101, 103, "38/85D", 83, 87, 103, 105, "40/90B", 88, 92, 103, 104, "40/90C", 88, 92, 105, 107, "40/90D", 88, 92, 108, 112, "40/90E", 88, 92, 113, 113];

    }

    for (var i = 0; i < sarr.length / 5; i++) {
        if (wight >= sarr[5 * i + 1] && wight <= sarr[5 * i + 2] && height >= sarr[5 * i + 3] && height <= sarr[5 * i + 4]) {
            size = sarr[5 * i];
            break;
        }
        if (i == sarr.length / 5 - 1) {
            alert("浜诧紒浣犵殑韬潗瀹炲湪鏄お妫掍簡锛屽凡缁忚秴鍑轰簡鏅€氫汉鐨勮寖鐣达紒");
        }
    }
    if (ci == 6) { //濂宠瑁ゅ瓙
        switch (size) {
            case "XS":
                size = "24/25";
                break;
            case "S":
                size = "25/26";
                break;
            case "M":
                size = "27/28";
                break;
            case "L":
                size = "29/30";
                break;
            case "XL":
                size = "31/32";
                break;
            case "XXL":
                size = "33/34";
                break;
        }
    }
    if (ci == 7) { //鐢疯
        switch (size) {
            case 44:
                size = "XS";
                break;
            case 46:
                size = "S";
                break;
            case 48:
                size = "M";
                break;
            case 50:
                size = "L";
                break;
            case 52:
                size = "XL";
                break;
            case 54:
                size = "XXL";
                break;
            case 56:
                size = "XXXL";
                break;
        }
    }
    if (ci == 8) { //鐢疯‖琛�
        switch (size) {
            case 44:
                size = "37";
                break;
            case 46:
                size = "38";
                break;
            case 48:
                size = "39";
                break;
            case 50:
                size = "40";
                break;
            case 52:
                size = "41";
                break;
            case 54:
                size = "42";
                break;
            case 56:
                size = "43";
                break;
        }
    }
    if (ci == 10) { //鐢疯￥瀛�
        switch (size) {
            case 44:
                size = "27";
                break;
            case 46:
                size = "28/29/30";
                break;
            case 48:
                size = "30/31/32";
                break;
            case 50:
                size = "33/34";
                break;
            case 52:
                size = "35/36";
                break;
            case 54:
                size = "38";
                break;
            case 56:
                size = "40";
                break;
        }
    }
    return size;
}