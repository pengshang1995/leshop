<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <base href="/leshop/Public/">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="size/hm.js"></script>
    <link rel="stylesheet" href="size/style.new.css">

    <link rel="stylesheet" type="text/css" href="size/style.css">
</head>
<body>
<script type="text/javascript">
    var sfHover = function () {
        var sfEls = document.getElementById("site_menu").getElementsByTagName("LI");
        for (var i = 0; i < sfEls.length; i++) {
            sfEls[i].onmouseover = function () {
                this.className += " sfhover";
            }
            sfEls[i].onmouseout = function () {
                this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
            }
        }
    }
    if (window.attachEvent) window.attachEvent("onload", sfHover);
</script>
<div class="size">
    <div class="size_main">
        <div class="size_left">
            <div>
                <h3><span id="1">女装</span>
                </h3>
                <ul>
                    <li id="2" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">衬衫</li>
                    <li id="3" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">连衣裙</li>
                    <li id="4" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">裤子</li>
                </ul>
            </div>
            <div>
                <h3><span id="5">男装</span>
                </h3>
                <ul>
                    <li id="6" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">衬衫</li>
                    <li id="7" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">西装</li>
                    <li id="8" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">裤子</li>
                </ul>
            </div>
            <div>
                <h3><span id="9">童装</span>
                </h3>
                <ul>
                    <li id="10" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">婴童</li>
                    <li id="11" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">中童</li>
                    <li id="12" style="color: rgb(47, 46, 46); background-color: rgb(255, 255, 255);">大童</li>
                </ul>
            </div>
            <div class="size_btn3">
                <h3><span id="15">鞋码</span>
                </h3>
            </div>
        </div>
        <div class="size_right">
            <div class="right3 right_same right_form" style="display: block;">
                <form onsubmit="return false;">
                    <p>
                        <span>您的身高<input type="text">（单位：厘米）</span>
                        <span>您的体重<input type="text">（单位：斤）</span>
                    </p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text">
                    </p>
                </form>
                <h2>女装标准尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>上衣尺码</td>
                        <td>S</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                        <td>XXL</td>
                        <td>XXXL</td>
                    </tr>
                    <tr>
                        <td>服装尺码</td>
                        <td>36</td>
                        <td>38</td>
                        <td>40</td>
                        <td>42</td>
                        <td>44</td>
                        <td>46</td>
                    </tr>
                    <tr>
                        <td>胸 围/cm</td>
                        <td>79-82</td>
                        <td>83-86</td>
                        <td>87-90</td>
                        <td>91-94</td>
                        <td>95-98</td>
                        <td>99-103</td>
                    </tr>
                    <tr>
                        <td>腰 围/cm</td>
                        <td>62-66</td>
                        <td>67-70</td>
                        <td>71-74</td>
                        <td>75-78</td>
                        <td>79-82</td>
                        <td>83-86</td>
                    </tr>
                    <tr>
                        <td>肩 宽/cm</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                        <td>41</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>身高/胸围</td>
                        <td>155/82A</td>
                        <td>160/86A</td>
                        <td>165/90A</td>
                        <td>170/94A</td>
                        <td>172/98A</td>
                        <td>175/102A</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">
                    说明：<br>
                    上述提供的计算公式是根据经验得到的数据参数，试用于绝大多数人群，不适用于特殊体型要求。<br>
                    国内比较普遍的一个判断胖瘦的公式是：<br>
                    女性之标准体重（千克）＝身长（厘米）－102<br>
                    注意：身高体重与尺寸没有绝对的关系，155CM丰腴和168CM瘦高的女生也许会穿同一个尺寸。胸围是影响上衣尺寸选择的关键因素，建议你可以以胸围选择。
                </div>
            </div>
            <div class="right4 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p>
                        <span>您的身高<input type="text">（单位：厘米）</span>
                        <span>您的体重<input type="text">（单位：斤）</span>
                    </p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text">
                    </p>
                </form>
                <h2>女衬衫标准尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>衬衫尺码</td>
                        <td>S</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                        <td>XXL</td>
                        <td>XXXL</td>
                    </tr>
                    <tr>
                        <td>国际尺码</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                        <td>41</td>
                    </tr>
                    <tr>
                        <td>胸 围/cm</td>
                        <td>79-82</td>
                        <td>83-86</td>
                        <td>87-90</td>
                        <td>91-94</td>
                        <td>95-98</td>
                        <td>99-103</td>
                    </tr>
                    <tr>
                        <td>腰 围/cm</td>
                        <td>62-66</td>
                        <td>67-70</td>
                        <td>71-74</td>
                        <td>75-78</td>
                        <td>79-82</td>
                        <td>83-86</td>
                    </tr>
                    <tr>
                        <td>肩 宽/cm</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                        <td>41</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>身高/胸围</td>
                        <td>155/82A</td>
                        <td>160/86A</td>
                        <td>165/90A</td>
                        <td>170/94A</td>
                        <td>172/98A</td>
                        <td>175/102A</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">国家服装号型的含义 号型定义：<span>"号"指人体的身高，以cm为单位，是设计和选购服装长短的依据；"型"指人体的胸围和腰围，以cm为单位，是设计和选购服装肥瘦的依据。体型分类：以人体的胸围与腰围的差数为依据来划分体型，并将体型分为四类，体型分类代号分别为Y(偏瘦)、A（正常）、B（偏胖）、C（肥胖）</span>本尺码对照表仅作参考之用。请您在试穿之后量身选择适合自己的尺寸。
                </div>
            </div>
            <div class="right5 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>连衣裙尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>裙子尺码</td>
                        <td>S</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                        <td>XXL</td>
                    </tr>
                    <tr>
                        <td>服装尺码</td>
                        <td>36</td>
                        <td>38</td>
                        <td>40</td>
                        <td>42</td>
                        <td>44</td>
                    </tr>
                    <tr>
                        <td>胸 围/cm</td>
                        <td>79-82</td>
                        <td>83-86</td>
                        <td>87-90</td>
                        <td>91-94</td>
                        <td>95-98</td>
                    </tr>
                    <tr>
                        <td>腰 围/cm</td>
                        <td>62-66</td>
                        <td>67-70</td>
                        <td>71-74</td>
                        <td>75-78</td>
                        <td>79-82</td>
                    </tr>
                    <tr>
                        <td>肩 宽/cm</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                        <td>41</td>
                    </tr>
                    <tr>
                        <td>身高/胸围</td>
                        <td>155/82A</td>
                        <td>160/86A</td>
                        <td>165/90A</td>
                        <td>170/94A</td>
                        <td>172/98A</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">服装号型标志：<span>号型的表示方法为号与型之间用斜线分开，后接体型分类代号。例如：上装160/84A，其中160为身高，代表号，84为胸围，代表型，A代表体型代号；下装160/68A，其中160为身高，代表号，68为腰围，代表型，A代表体型代号。</span>本尺码对照表仅作参考之用。请您在试穿之后量身选择适合自己的尺寸。
                </div>
            </div>
            <div class="right6 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>女裤子尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>女裤</td>
                        <td colspan="2">S</td>
                        <td colspan="2">M</td>
                        <td colspan="2">L</td>
                        <td colspan="2">XL</td>
                    </tr>
                    <tr>
                        <td>裤子尺码(英寸)</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                    </tr>
                    <tr>
                        <td>国标号型</td>
                        <td>155/62A</td>
                        <td>159/64A</td>
                        <td>160/66A</td>
                        <td>164/68A</td>
                        <td>165/70A</td>
                        <td>169/72A</td>
                        <td>170/74A</td>
                        <td>170/76A</td>
                    </tr>
                    <tr>
                        <td>对应臀围(cm)</td>
                        <td>85</td>
                        <td>87.5</td>
                        <td>90</td>
                        <td>92.5</td>
                        <td>95</td>
                        <td>97.5</td>
                        <td>100</td>
                        <td>102.5</td>
                    </tr>
                    <tr>
                        <td>对应腰围(cm)</td>
                        <td>62</td>
                        <td>64.5</td>
                        <td>67</td>
                        <td>69.5</td>
                        <td>72</td>
                        <td>74.5</td>
                        <td>77</td>
                        <td>79.5</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">如何测量裤侧长：从腰部开始测量一直到脚裸的长度就是裤侧长。<br>如何测量腰围：经脐点(om)的腰部水平围长<br>标准腰围计算方法：腰围=身高的1/2减19厘米(如:身高160cm的标准腰围=160cm
                    /2-19=61cm )<br>本尺码对照表仅作参考之用。请您在试穿之后量身选择适合自己的尺寸。
                </div>
            </div>
            <div class="right7 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>男装标准尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>上衣尺码</td>
                        <td>S</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                        <td>XXL</td>
                        <td>XXXL</td>
                    </tr>
                    <tr>
                        <td>服装尺码</td>
                        <td>46</td>
                        <td>48</td>
                        <td>50</td>
                        <td>52</td>
                        <td>54</td>
                        <td>56</td>
                    </tr>
                    <tr>
                        <td>中国号型</td>
                        <td>165/80A</td>
                        <td>170/84A</td>
                        <td>175/88A</td>
                        <td>180/92A</td>
                        <td>185/96A</td>
                        <td>190/100A</td>
                    </tr>
                    <tr>
                        <td>胸 围/cm</td>
                        <td>82-85</td>
                        <td>86-89</td>
                        <td>90-93</td>
                        <td>94-97</td>
                        <td>98-102</td>
                        <td>103-107</td>
                    </tr>
                    <tr>
                        <td>腰 围/cm</td>
                        <td>72-75</td>
                        <td>76-79</td>
                        <td>80-84</td>
                        <td>85-88</td>
                        <td>89-92</td>
                        <td>93-96</td>
                    </tr>
                    <tr>
                        <td>肩 宽/cm</td>
                        <td>42</td>
                        <td>44</td>
                        <td>46</td>
                        <td>48</td>
                        <td>50</td>
                        <td>52</td>
                    </tr>
                    <tr>
                        <td>适合身高/cm</td>
                        <td>163/167</td>
                        <td>168/172</td>
                        <td>173/177</td>
                        <td>178/182</td>
                        <td>182/187</td>
                        <td>187/190</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">说明：<br>上述提供的计算公式是根据经验得到的数据参数，试用于绝大多数人群，不适用于特殊体型要求。<br>国内比较普遍的一个判断胖瘦的公式是：<br>男性标准体重：身高（厘米）－105=
                    标准体重（千克）本尺码对照表仅作参考之用。请您在试穿之后量身选择适合自己的尺寸。
                </div>
            </div>
            <div class="right8 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>衬衫尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>衬衫尺码</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                    </tr>
                    <tr>
                        <td>国际型号</td>
                        <td>160/80A</td>
                        <td>165/84A</td>
                        <td>170/88A</td>
                        <td>175/92A</td>
                        <td>180/96A</td>
                        <td>180/100A</td>
                        <td>185/104A</td>
                    </tr>
                    <tr>
                        <td>肩宽</td>
                        <td>42-43</td>
                        <td>44-45</td>
                        <td>46-47</td>
                        <td>47-48</td>
                        <td>49-50</td>
                        <td>51-52</td>
                        <td>53-54</td>
                    </tr>
                    <tr>
                        <td>胸围</td>
                        <td>98-101</td>
                        <td>102-105</td>
                        <td>106-109</td>
                        <td>110-113</td>
                        <td>114-117</td>
                        <td>118-121</td>
                        <td>122-125</td>
                    </tr>
                    <tr>
                        <td>衣长</td>
                        <td>72</td>
                        <td>74</td>
                        <td>76</td>
                        <td>78</td>
                        <td>80</td>
                        <td>82</td>
                        <td>83</td>
                    </tr>
                    <tr>
                        <td>身高</td>
                        <td>160</td>
                        <td>165</td>
                        <td>170</td>
                        <td>175</td>
                        <td>180</td>
                        <td>185</td>
                        <td>190</td>
                    </tr>
                    <tr>
                        <td>上衣尺码</td>
                        <td>XS</td>
                        <td>S</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                        <td>XXL</td>
                        <td>XXXL</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">
                    注意：<span>男式西服按照男士体型可分为偏瘦型、标准型、偏胖型。但这只是标准尺码，实际生活中因个人体型差异较大，本尺码仅作参考之用。请您在试穿之后量身选择适合自己的尺寸。</span></div>
            </div>
            <div class="right9 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>西装尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>尺&nbsp;&nbsp;&nbsp;&nbsp;码</td>
                        <td>规&nbsp;&nbsp;&nbsp;&nbsp;格</td>
                        <td>板&nbsp;&nbsp;&nbsp;&nbsp;型</td>
                        <td>衣&nbsp;&nbsp;&nbsp;&nbsp;长</td>
                        <td>胸&nbsp;&nbsp;&nbsp;&nbsp;围</td>
                        <td>肩&nbsp;&nbsp;&nbsp;&nbsp;宽</td>
                        <td>袖&nbsp;&nbsp;&nbsp;&nbsp;长</td>
                    </tr>
                    <tr>
                        <td>2R48</td>
                        <td>165/96C</td>
                        <td>偏胖</td>
                        <td>70</td>
                        <td>106</td>
                        <td>44.7</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>2R50</td>
                        <td>170/100C</td>
                        <td>偏胖</td>
                        <td>72</td>
                        <td>110</td>
                        <td>45.9</td>
                        <td>61.5</td>
                    </tr>
                    <tr>
                        <td>2R52</td>
                        <td>175/104C</td>
                        <td>偏胖</td>
                        <td>74</td>
                        <td>114</td>
                        <td>47.1</td>
                        <td>63</td>
                    </tr>
                    <tr>
                        <td>2R54</td>
                        <td>180/108C</td>
                        <td>偏胖</td>
                        <td>76</td>
                        <td>118</td>
                        <td>48.3</td>
                        <td>64.5</td>
                    </tr>
                    <tr>
                        <td>2R56</td>
                        <td>185/112C</td>
                        <td>偏胖</td>
                        <td>78</td>
                        <td>122</td>
                        <td>49.5</td>
                        <td>66</td>
                    </tr>
                    <tr>
                        <td>4R46</td>
                        <td>165/92B</td>
                        <td>标准</td>
                        <td>70</td>
                        <td>102</td>
                        <td>43.5</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>4R48</td>
                        <td>170/96B</td>
                        <td>标准</td>
                        <td>72</td>
                        <td>106</td>
                        <td>44.7</td>
                        <td>61.5</td>
                    </tr>
                    <tr>
                        <td>4R50</td>
                        <td>175/100B</td>
                        <td>标准</td>
                        <td>74</td>
                        <td>110</td>
                        <td>45.9</td>
                        <td>63</td>
                    </tr>
                    <tr>
                        <td>4R52</td>
                        <td>180/104B</td>
                        <td>标准</td>
                        <td>76</td>
                        <td>114</td>
                        <td>47.1</td>
                        <td>64.5</td>
                    </tr>
                    <tr>
                        <td>4R54</td>
                        <td>185/108B</td>
                        <td>标准</td>
                        <td>78</td>
                        <td>118</td>
                        <td>48.3</td>
                        <td>66</td>
                    </tr>
                    <tr>
                        <td>6R44</td>
                        <td>165/88A</td>
                        <td>偏瘦</td>
                        <td>70</td>
                        <td>98</td>
                        <td>42.3</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>6R46</td>
                        <td>170/92A</td>
                        <td>偏瘦</td>
                        <td>72</td>
                        <td>102</td>
                        <td>43.5</td>
                        <td>61.5</td>
                    </tr>
                    <tr>
                        <td>6R48</td>
                        <td>175/96A</td>
                        <td>偏瘦</td>
                        <td>74</td>
                        <td>106</td>
                        <td>44.7</td>
                        <td>63</td>
                    </tr>
                    <tr>
                        <td>6R50</td>
                        <td>180/100A</td>
                        <td>偏瘦</td>
                        <td>76</td>
                        <td>110</td>
                        <td>45.9</td>
                        <td>64.5</td>
                    </tr>
                    <tr>
                        <td>6R52</td>
                        <td>185/104A</td>
                        <td>偏瘦</td>
                        <td>78</td>
                        <td>114</td>
                        <td>47.1</td>
                        <td>66</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">男式西服按照男士体型可分为偏瘦型、标准型、偏胖型</div>
            </div>
            <div class="right10 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>男裤子尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td rowspan="2">男裤子尺码</td>
                        <td colspan="2">S</td>
                        <td colspan="2">M</td>
                        <td colspan="2">L</td>
                    </tr>
                    <tr>
                        <td>170/72A</td>
                        <td>170/74A</td>
                        <td>170/76A</td>
                        <td>175/80A</td>
                        <td>175/82A</td>
                        <td>175/84A</td>
                    </tr>
                    <tr>
                        <td>裤子尺码(英寸)</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                    </tr>
                    <tr>
                        <td>对应臀围(cm)</td>
                        <td>97.5</td>
                        <td>100</td>
                        <td>102.5</td>
                        <td>105</td>
                        <td>107.5</td>
                        <td>110</td>
                    </tr>
                    <tr>
                        <td>对应腰围(cm)</td>
                        <td>73.7</td>
                        <td>76.2</td>
                        <td>78.7</td>
                        <td>81.3</td>
                        <td>83.8</td>
                        <td>86.4</td>
                    </tr>
                    <tr>
                        <td>腰围/市尺</td>
                        <td>2尺2寸</td>
                        <td>2尺3寸</td>
                        <td>2尺4寸</td>
                        <td>2尺4寸</td>
                        <td>2尺5寸</td>
                        <td>2尺6寸</td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="tab_10">
                    <tbody>
                    <tr>
                        <td rowspan="2">男裤子尺码</td>
                        <td colspan="2">XL</td>
                        <td colspan="2">XXL</td>
                        <td colspan="2">XXXL</td>
                    </tr>
                    <tr>
                        <td>180/86A</td>
                        <td>180/90A</td>
                        <td>185/92A</td>
                        <td>185/94B</td>
                        <td>190/98B</td>
                        <td>195/102B</td>
                    </tr>
                    <tr>
                        <td>裤子尺码(英寸)</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>40</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>对应臀围(cm)</td>
                        <td>112.5</td>
                        <td>100</td>
                        <td>117.5</td>
                        <td>120</td>
                        <td>122.5</td>
                        <td>130</td>
                    </tr>
                    <tr>
                        <td>对应腰围(cm)</td>
                        <td>89</td>
                        <td>91.4</td>
                        <td>93.3</td>
                        <td>96.5</td>
                        <td>101.6</td>
                        <td>106.6</td>
                    </tr>
                    <tr>
                        <td>腰围/市尺</td>
                        <td>2尺6寸</td>
                        <td>2尺7寸</td>
                        <td>2尺8寸</td>
                        <td>2尺9寸</td>
                        <td>3尺1寸</td>
                        <td>3尺2寸</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">本尺码仅作参考之用。请您在试穿之后量身选择适合自己裤子尺码。</div>
            </div>
            <div class="right11 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>童装尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>年龄</td>
                        <td>尺码</td>
                        <td>身高</td>
                        <td>胸围</td>
                        <td>腰围</td>
                    </tr>
                    <tr>
                        <td>0-3个月</td>
                        <td>59</td>
                        <td>59</td>
                        <td>50</td>
                        <td>38</td>
                    </tr>
                    <tr>
                        <td>3-6个月</td>
                        <td>66</td>
                        <td>66</td>
                        <td>53</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>6-9个月</td>
                        <td>73</td>
                        <td>73</td>
                        <td>56</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>9-12个月</td>
                        <td>80</td>
                        <td>80</td>
                        <td>59</td>
                        <td>44</td>
                    </tr>
                    <tr>
                        <td>1-1.5岁</td>
                        <td>90</td>
                        <td>90</td>
                        <td>62</td>
                        <td>46</td>
                    </tr>
                    <tr>
                        <td>1.5岁-3岁</td>
                        <td>100</td>
                        <td>100</td>
                        <td>54</td>
                        <td>52</td>
                    </tr>
                    <tr>
                        <td>3岁-6岁</td>
                        <td>110</td>
                        <td>110</td>
                        <td>58</td>
                        <td>54</td>
                    </tr>
                    <tr>
                        <td>6岁-8岁</td>
                        <td>120</td>
                        <td>120</td>
                        <td>64</td>
                        <td>56</td>
                    </tr>
                    <tr>
                        <td>8岁-10岁</td>
                        <td>130</td>
                        <td>130</td>
                        <td>65</td>
                        <td>58</td>
                    </tr>
                    <tr>
                        <td>10岁-11岁</td>
                        <td>140</td>
                        <td>150</td>
                        <td>68</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>12岁-13岁</td>
                        <td>150</td>
                        <td>150</td>
                        <td>72</td>
                        <td>62</td>
                    </tr>
                    <tr>
                        <td>14岁-15岁</td>
                        <td>160</td>
                        <td>160</td>
                        <td>76</td>
                        <td>64</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">说明：<br>上述提供的计算公式是根据经验得到的数据参数，试用于绝大多数人群，不适用于特殊体型要求。注意：表格中尺码项即为小孩身高，请顾客按照尺码项选择合适的码数，宝贝幼嫩肌肤。
                </div>
            </div>
            <div class="right12 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>婴童尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>尺码(cm)</td>
                        <td>59</td>
                        <td>66</td>
                        <td>73</td>
                        <td>80</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>年龄</td>
                        <td>0-3个月</td>
                        <td>3-6个月</td>
                        <td>6-9个月</td>
                        <td>9-12个月</td>
                        <td>1-1.5岁</td>
                    </tr>
                    <tr>
                        <td>身高</td>
                        <td>59</td>
                        <td>66</td>
                        <td>73</td>
                        <td>80</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>胸围</td>
                        <td>41</td>
                        <td>44</td>
                        <td>47</td>
                        <td>50</td>
                        <td>52</td>
                    </tr>
                    <tr>
                        <td>腰围</td>
                        <td>38</td>
                        <td>40</td>
                        <td>42</td>
                        <td>44</td>
                        <td>46</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">说明：<br>上述提供的计算公式是根据经验得到的数据参数，试用于绝大多数人群，不适用于特殊体型要求。<br>注意：表格中尺码项即为小孩身高，请顾客按照尺码项选择合适的码数。宝贝幼嫩肌肤，需要用心呵护。童装与成人服饰最大的区别在于用料和印染技术，宝耶童装精选上等环保面料，采用最新最环保的印染技术，保证毎一件衣服都对宝贝的皮肤无任何刺激。
                </div>
            </div>
            <div class="right13 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>中童尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>尺码(cm)</td>
                        <td>100</td>
                        <td>110</td>
                        <td>120</td>
                        <td>130</td>
                    </tr>
                    <tr>
                        <td>年龄</td>
                        <td>1.5岁-3岁</td>
                        <td>3岁-6岁</td>
                        <td>6岁-8岁</td>
                        <td>8岁-10岁</td>
                    </tr>
                    <tr>
                        <td>身高</td>
                        <td>100</td>
                        <td>110</td>
                        <td>120</td>
                        <td>130</td>
                    </tr>
                    <tr>
                        <td>胸围</td>
                        <td>54</td>
                        <td>58</td>
                        <td>62</td>
                        <td>66</td>
                    </tr>
                    <tr>
                        <td>腰围</td>
                        <td>52</td>
                        <td>54</td>
                        <td>56</td>
                        <td>58</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">
                    说明：<br>上述提供的计算公式是根据经验得到的数据参数，试用于绝大多数人群，不适用于特殊体型要求。<br>注意：表格中尺码项即为小孩身高，请顾客按照尺码项选择合适的码数。<br>吊牌上的执行标准的含义：<br>A类，B类，C类的含义：这是国标中对甲醛含量的规定，A类是婴糼儿用品，B类是直接接触皮肤，C类是非直接接触皮肤。
                </div>
            </div>
            <div class="right14 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>您的身高<input type="text">（单位：厘米）</span><span>您的体重<input type="text">（单位：斤）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>大童尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>尺码(cm)</td>
                        <td>130</td>
                        <td>140</td>
                        <td>150</td>
                        <td>160</td>
                    </tr>
                    <tr>
                        <td>年龄</td>
                        <td>8岁-10岁</td>
                        <td>10岁-11岁</td>
                        <td>12岁-13岁</td>
                        <td>14岁-15岁</td>
                    </tr>
                    <tr>
                        <td>身高</td>
                        <td>130</td>
                        <td>140</td>
                        <td>150</td>
                        <td>160</td>
                    </tr>
                    <tr>
                        <td>胸围</td>
                        <td>66</td>
                        <td>69</td>
                        <td>73</td>
                        <td>78</td>
                    </tr>
                    <tr>
                        <td>腰围</td>
                        <td>58</td>
                        <td>60</td>
                        <td>62</td>
                        <td>64</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">
                    说明：<br>上述提供的计算公式是根据经验得到的数据参数，试用于绝大多数人群，不适用于特殊体型要求。<br>注意：表格中尺码项即为小孩身高，请顾客按照尺码项选择合适的码数。<br>宝贝幼嫩肌肤，需要用心呵护。童装与成人服饰最大的区别在于用料和印染技术，宝耶童装精选上等环保面料，采用最新最环保的印染技术，保证毎一件衣服都对宝贝的皮肤无任何刺激。
                </div>
            </div>
            <div class="right15 right_same right_form" style="display: none;">
                <form onsubmit="return false;">
                    <p><span>上胸围<input type="text">（单位：厘米）</span><span>下胸围<input type="text">（单位：厘米）</span></p>
                    <p class="cmsc">
                        <button><img src="size/baidu_cmsc.gif"
                                     data-bd-imgshare-binded="1"></button>
                        <input type="text"></p>
                </form>
                <h2>文胸尺码对照表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>下胸围(cm)</td>
                        <td>上胸围(cm)</td>
                        <td>国际尺码</td>
                        <td>下胸围(cm)</td>
                        <td>上胸围(cm)</td>
                        <td>国际尺码</td>
                    </tr>
                    <tr>
                        <td rowspan="5">68-72</td>
                        <td>80</td>
                        <td>32/70A</td>
                        <td rowspan="5">73-77</td>
                        <td>85</td>
                        <td>34/75A</td>
                    </tr>
                    <tr>
                        <td>83</td>
                        <td>32/70B</td>
                        <td>88</td>
                        <td>34/75B</td>
                    </tr>
                    <tr>
                        <td>85</td>
                        <td>32/70C</td>
                        <td>90</td>
                        <td>34/75C</td>
                    </tr>
                    <tr>
                        <td>88</td>
                        <td>32/70D</td>
                        <td>95</td>
                        <td>34/75D</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>98</td>
                        <td>34/75E</td>
                    </tr>
                    <tr>
                        <td>下胸围(cm)</td>
                        <td>上胸围(cm)</td>
                        <td>国际尺码</td>
                        <td>下胸围(cm)</td>
                        <td>上胸围(cm)</td>
                        <td>国际尺码</td>
                    </tr>
                    <tr>
                        <td rowspan="5">78-82</td>
                        <td>90</td>
                        <td>36/80A</td>
                        <td rowspan="5">83-87</td>
                        <td>95-97</td>
                        <td>38/85A</td>
                    </tr>
                    <tr>
                        <td>93</td>
                        <td>36/80B</td>
                        <td>99-101</td>
                        <td>38/85B</td>
                    </tr>
                    <tr>
                        <td>95</td>
                        <td>36/80C</td>
                        <td>101-103</td>
                        <td>38/85C</td>
                    </tr>
                    <tr>
                        <td>98</td>
                        <td>36/80D</td>
                        <td>103-105</td>
                        <td>338/85D</td>
                    </tr>
                    <tr>
                        <td>103</td>
                        <td>36/80E</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>下胸围(cm)</td>
                        <td>上胸围(cm)</td>
                        <td>国际尺码</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td rowspan="4">88-92</td>
                        <td>103</td>
                        <td>40/90B</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>105</td>
                        <td>40/90C</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>108</td>
                        <td>40/90D</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>113</td>
                        <td>40/90E</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <!-- <div class="p"></div>-->
            </div>
            <div class="right1 right_form" style="display: none;">
                <h2>尺码表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>女式内裤：</th>
                    </tr>
                    <tr>
                        <td>尺码</td>
                        <td>S</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                    </tr>
                    <tr>
                        <td>腰围</td>
                        <td>55-61</td>
                        <td>61-67</td>
                        <td>67-73</td>
                        <td>73-79</td>
                    </tr>
                    <tr>
                        <td>腰围（市尺）</td>
                        <td>1.8-1.9</td>
                        <td>1.9-2.1</td>
                        <td>2.1-2.2</td>
                        <td>2.2-2.3</td>
                    </tr>
                    <tr>
                        <td>臀围</td>
                        <td>80-86</td>
                        <td>85-93</td>
                        <td>90-98</td>
                        <td>95-103</td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="tab_1">
                    <tbody>
                    <tr>
                        <th>男式内裤：</th>
                    </tr>
                    <tr>
                        <td>尺码</td>
                        <td>M</td>
                        <td>L</td>
                        <td>XL</td>
                        <td>XXL</td>
                    </tr>
                    <tr>
                        <td>腰围</td>
                        <td>62-70</td>
                        <td>66-74</td>
                        <td>72-82</td>
                        <td>76-84</td>
                    </tr>
                    <tr>
                        <td>腰围（市尺）</td>
                        <td>2.0-2.2</td>
                        <td>2.2-2.4</td>
                        <td>2.4-2.5</td>
                        <td>&gt;2.6</td>
                    </tr>
                    <tr>
                        <td>臀围</td>
                        <td>82-90</td>
                        <td>86-94</td>
                        <td>88-96</td>
                        <td>94-102</td>
                    </tr>
                    <tr>
                        <td>身高</td>
                        <td>160-170</td>
                        <td>165-175</td>
                        <td>170-180</td>
                        <td>175-185</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">备注：<br>按贴身腰围为准。相同码数，但因款式不同、材料不同等因素，会有2cm左右偏差，购买时最好咨询相关人员为准。<br>本尺码仅作参考之用。请您在试穿之后量身选择适合自己的尺寸。
                </div>
            </div>
            <div class="right2 right_form" style="display: none;">
                <h2>尺码表</h2>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>男鞋：</th>
                    </tr>
                    <tr>
                        <td>脚长 cm</td>
                        <td>24.5</td>
                        <td>25</td>
                        <td>25.5</td>
                        <td>26</td>
                        <td>26.5</td>
                        <td>27</td>
                        <td>27.5</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>欧洲EUR</td>
                        <td>39 1/3</td>
                        <td>40</td>
                        <td>40 2/3</td>
                        <td>41 1/3</td>
                        <td>42</td>
                        <td>42 2/3</td>
                        <td>43 1/3</td>
                        <td>44</td>
                    </tr>
                    <tr>
                        <td>美国 US</td>
                        <td>6.5</td>
                        <td>7</td>
                        <td>7.5</td>
                        <td>8</td>
                        <td>8.5</td>
                        <td>9</td>
                        <td>9.5</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>英国 UK</td>
                        <td>6</td>
                        <td>6.5</td>
                        <td>7</td>
                        <td>7.5</td>
                        <td>8</td>
                        <td>8.5</td>
                        <td>9</td>
                        <td>9.5</td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="tab_1">
                    <tbody>
                    <tr>
                        <th>女鞋：</th>
                    </tr>
                    <tr>
                        <td>脚长 cm</td>
                        <td>22.5</td>
                        <td>23</td>
                        <td>23.5</td>
                        <td>24</td>
                        <td>24.5</td>
                        <td>25</td>
                        <td>25.5</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>欧洲EUR</td>
                        <td>36 2/3</td>
                        <td>37 1/3</td>
                        <td>38</td>
                        <td>38 2/3</td>
                        <td>39 1/3</td>
                        <td>40</td>
                        <td>40 2/3</td>
                        <td>41 1/3</td>
                    </tr>
                    <tr>
                        <td>美国 US</td>
                        <td>5.5</td>
                        <td>6</td>
                        <td>6.5</td>
                        <td>7</td>
                        <td>7.5</td>
                        <td>8</td>
                        <td>8.5</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>英国 UK</td>
                        <td>4.5</td>
                        <td>5</td>
                        <td>5.5</td>
                        <td>6</td>
                        <td>6.5</td>
                        <td>7</td>
                        <td>7.5</td>
                        <td>8</td>
                    </tr>
                    </tbody>
                </table>
                <div class="p">选购时请综合参考尺码表中的各项参数，这有助您选择到更好的尺码。<br>(仅供参考，测量脚时请注意用适当力度轻踩水平面上。因测量方法不同，测量出来的数据也会不一样。)<br>国际标准鞋号表示的是脚长的毫米数。中国标准采用毫米数或厘米数。如：245是毫米数，24
                    1/2是厘米数，表示一样的尺码。
                </div>
            </div>
        </div>
    </div>
    <div class="size_foot">
    </div>
</div>
<script type="text/javascript" src="size/jquery.min.js"></script>
<script type="text/javascript" src="size/ga.js"></script>