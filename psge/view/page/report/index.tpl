<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{%$module.name%}测试报告</title>
    <link type="text/css" rel='stylesheet' href="../static/page/report/report.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/lib/graphic/graphic.js"></script>
    <script type="text/javascript" src="../static/page/report/report.js"></script>
</head>
<body>



<div class="module">
    <div class="maintitle">
        <h1>{%$module.name%}测试报告</h1>
    </div>
    <div class="send_mail">
        <div class="send_mail_button">发送邮件</div>
    </div>


    {%if $module.data.content.funs %}
        {%include file="./widget/gContent.tpl" datas=$module.data.content.funs%}
    {%/if%}



{%* -------------  testdata  ---------- *%}
{%if $module.data.testdata%}
    <div class="testdata">
        <div class="title">
            <h3>测试数据</h3>
        </div>

        <div class="datacontent">


        {%* ------  bug列表    -------- *%}
        {%if $module.data.testdata.bugs%}
            {%$datas = $module.data.testdata.bugs%}
            <div class="data_title">
                <h4>bug数和分布</h4>
            </div>
            <div class="bugtable">
                <table align="center" cellpadding="5" cellspacing="1" border="1" >
                    <tr bgcolor="#19688c" align="center" style="font-weight: bold;">
                        <td width="60%">功能</td>
                        <td width="10%">bug总数</td>
                        <td width="15%">active bug</td>
                        <td width="20%">负责人</td>
                    </tr>
                {%foreach $datas as $item%}
                    <tr>
                        <td>{%$item.fun%}</td>
                        <td style="color:#009933">{%$item.count%}</td>
                        {%if $item.active gt 0%}
                             <td style="color:#FF0000">{%$item.active%}</td>
                        {%else%}
                             <td>{%$item.active%}</td>
                        {%/if%}

                        <td>
                            <div>{%$item.qa%}</div>
                            <div style="color:#FF0000">{%$item.rd%}</div>
                        </td>
                    </tr>
                {%/foreach%}
                </table>
            </div>
        {%/if%}
        {%* ------  bug列表    -------- *%}



        {%* ------  diff结果    -------- *%}
        {%if $module.data.testdata.diffs%}
            {%$datas = $module.data.testdata.diffs%}
            <div class="data_title">
                <h4>diff结果</h4>
            </div>

            {%foreach $datas as $product_name => $data%}
                <h4 style="margin-left:20px;color:#fff01c;">{%$product_name%}产品线</h4>
                <div style="color:#ffc339;margin-left:20px;font-size:18px">1.新发布版本与上一版本编译时间对比:</div>
                <div class="diff_table">
                    <table width="800" border="1" cellpadding="5" cellspacing="1">
                        <thead>
                        <tr bgcolor="#19688c" align="center">
                            <td>模块名</td>
                            <td>新版本的编译时间</td>
                            <td>老版本的编译时间</td>
                            <td>差值</td>
                        </tr>
                        </thead>
                        <tbody>
                            {%foreach $data as $item%}
                                <tr align="center">
                                    <td> {%$item.module%}</td>
                                    <td> {%$item.new%}</td>
                                    <td> {%$item.old%}</td>
                                    {%if $item.change  gt 0 %}
                                        <td style="color:#FF0000">上升{%$item.change%}%</td>
                                    {%else%}
                                        <td style="color:#009933">下降{%0-$item.change%}%</td>
                                    {%/if%}

                                </tr>
                            {%/foreach%}
                        </tbody>
                    </table>
                </div>

                <div style="color:#ffc339;margin-left:20px;font-size:18px;margin-top:20px;">2.dev分支编译时间曲线图:</div>
                <div class="diff_chart">
                    <img src="http://10.48.30.87:8088/{%$module.project%}_dev_diff_slow/test/util/diff/test_compiletime.php?product={%$product_name%}">
                </div>
            {%/foreach%}

            <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:20px;margin-top:20px;margin-bottom:10px">@@ diff结论</div>
            {%include file="./widget/lContent.tpl" datas=$module.data.testdata.else.diffResult%}

        {%/if%}
        {%* ------  diff结果    -------- *%}



        {%* ------  cov    -------- *%}
            {%if $module.data.testdata.cov%}
                {%$datas = $module.data.testdata.cov%}
                <div class="data_title">
                    <h3>覆盖率</h3>
                </div>
               <div id="case_coverage" style="margin-left:auto;margin-right:auto;width:700px;margin-bottom: 50px;">
               </div>
                <div class="coverage">
                    <script type="text/javascript">
                        {%if $module.data.testdata.cov%}
                        Ge.CreateChart({%$datas.covs%},{%$datas.versions%});
                        {%/if%}
                    </script>
                </div>

               <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:20px;margin-top:20px;margin-bottom:10px">@@ coverage结论</div>
               {%include file="./widget/lContent.tpl" datas=$module.data.testdata.else.covResult%}
            {%/if%}
        {%* ------  cov    -------- *%}



        {%* ------  其它数据    -------- *%}
        {%if $module.data.testdata.else.isCaseStatistic%}
            <div class="data_title">
                <h3>本版本自动化case添加个数</h3>
            </div>
            {%include file="./widget/lContent.tpl" datas=$module.data.testdata.else.caseStatistic%}
        {%/if%}


        {%if $module.data.testdata.else.isStartScript%}
            <div class="data_title">
                <h3>Start.sh脚本</h3>
            </div>
            {%include file="./widget/lContent.tpl" datas=$module.data.testdata.else.startScript%}
        {%/if%}


        {%if $module.data.testdata.else.is_CI_Sample%}
            <div class="data_title">
                <h3>CI、sample自动化是否全部通过</h3>
            </div>
            {%include file="./widget/lContent.tpl" datas=$module.data.testdata.else.CI_Sample%}
        {%/if%}


        {%if $module.data.testdata.else.isCompile%}
            <div class="data_title">
                <h3>是否在编译机上运行（用于保证产品线使用编辑机环境正常</h3>
            </div>
            {%include file="./widget/lContent.tpl" datas=$module.data.testdata.else.compile%}
        {%/if%}
        {%* ------  其它数据    -------- *%}

        </div>
    </div>
{%/if%}
{%* -------------  testdata  ---------- *%}



    {%* -------------  测试结论  ---------- *%}
    {%if $module.data.content.result %}
         {%include file="./widget/gContent.tpl" datas=$module.data.content.result%}
    {%/if%}
    {%* -------------  测试结论  ---------- *%}


    {%* -------------  效率数据  ---------- *%}
    {%if $module.data.content.effi %}
         {%include file="./widget/gContent.tpl" datas=$module.data.content.effi%}
    {%/if%}
    {%* -------------  效率数据  ---------- *%}


    {%* -------------  补充说明  ---------- *%}
    {%if $module.data.content.exp %}
         {%include file="./widget/gContent.tpl" datas=$module.data.content.exp%}
    {%/if%}
    {%* -------------  补充说明  ---------- *%}

    <div class="send_mail">
        <div class="send_mail_button">发送邮件</div>
    </div>

</div>

<div class="tip">邮件发送成功</div>

<script type="text/javascript">
    var width = $("body").width();
    $(".tip").css("left",width/2);

    $(".send_mail_button").click(function(){
        $.get("./ReportSendMail.php",{
            file:"{%$report_simple_file%}",
            project:"{%$module.project%}",
            version:"{%$module.version%}"
        },function(data, status){
              if(data){
                  $(".tip").html("邮件发送成功").slideDown(1000);
                  setTimeout(function(){
                      $(".tip").slideUp(500);
                  },1100)
              }else{
                  $(".tip").slideDown(1000);
                  setTimeout(function(){
                      $(".tip").html("邮件发送失败").slideUp(500);
                  },2000)
              }
        });
    })
</script>

</body>
</html>
