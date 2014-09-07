<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="网络延迟测试,网络丢包测试,网速测试,Krypt,美国洛杉矶KT机房,美国圣安娜KT机房,美国洛杉矶Peer1机房,香港新世界NWT机房,香港电讯盈科PCCW机房,香港新力讯SunnyVision机房,日本樱花,日本东京KDDI(Linode),日本东京ServerCentral(VPS.Net、Vultr),新加坡OneAsiaHost(OAH)">
<meta name="description" content="网络观察镜(Looking Glass)是一个收集统计各ISP或者机房到中国三大运营商网络质量的工具。">
<title>网络观察镜|Looking Glass</title>

<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css" type="text/css">

<style type="text/css">
.chartheader{
	min-width:960px;
	height:600px;
}
.chart{
	min-width:960px;
	height:540px;
}

</style>

<!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js" type="text/javascript"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js" type="text/javascript"></script>
    <![endif]-->

<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.js" type="text/javascript"></script>

</head>

<body>
<h2>Looking Glass正在收集数据和进行测试</h2>
<h3>与BGPlay功能不同，这个工具只采集Ping数据。</h3>
<h4>数据来自超过10个不同ISP或者机房的Looking Glass，其中有KT，很平衡。</h4>
<h5>数据仅供参考。</h5>
<br />
<h5>以下是历史数据：</h5>
<div class="container">
<div id="chartheader" class="chartheader">
<ul id="chartTab" class="nav nav-tabs">
{foreach from=$sourceArray item=$sourceItem name=sourceList}
{if $smarty.foreach.sourceList.iteration < 1}
        <li class="active"><a href="#{$sourceItem["source"]|replace:" ":""|lower}" data-toggle="tab">{$sourceItem["source"]}</a></li>
{else}
        <li class=""><a href="#{$sourceItem["source"]|replace:" ":""|lower}" data-toggle="tab">{$sourceItem["source"]}</a></li>
{/foreach}
      </ul>     
      <div id="chart" class="tab-content">
{foreach from=$sourceArray item=$sourceItem}
      <div id="chinatelecom" class="chart tab-pane fade active in">
      </div>
      <div id="chinaunicom" class="chart tab-pane fade">
      </div>
      <div id="chinamobile" class="chart tab-pane fade">
{/foreach}
      </div>
      <script type="text/javascript">
$('#chartTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
<div class="col-xs-12">
<table id="example" class="table table-striped col-xs-10">
<thead>
          <tr>
            <th>来源——目的</th>
            <th>最低延迟</th>
            <th>平均延迟</th>
            <th>最高延迟</th>
            <th>丢包率</th>
            <th>测试时间</th>
          </tr>
        </thead>
        <tbody>
        {foreach from=$ctArray item=ctSingleArray}
        <tr>
        <td colspan="6">
        {$ctSingleArray[0].source}——中国电信
        </td>
        </tr>
        {foreach from=$ctSingleArray item=ctItem}
        <tr>
        <td>
        {$ctItem.source}
        </td>
        <td>
        {$ctItem.min}ms
        </td>
        <td>
        {$ctItem.avg}ms
        </td>
        <td>
        {$ctItem.max}ms
        </td>
        <td>
        {$ctItem.loss}%
        </td>
        <td>
        {$ctItem.time}
        </td>
        </tr>
        {/foreach}
        {/foreach}
        </tbody>
</table>
</div>
</div>


<footer class="text-right"><a href="http://sae.sina.com.cn/" title="SinaAppEngine" target="_blank"><img src="/images/poweredbysae-120x33px.png" width="120px" height="33px" alt="Powered By SinaAppEngine"></a>Page rendered in <strong>{$elapsed_time}</strong> seconds, used <strong>{$memory_get_usage}</strong> KB memory.</footer>
</body>
</html>
