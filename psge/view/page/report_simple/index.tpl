<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{%$module.name%}测试报告</title>
    <link type="text/css" rel='stylesheet' href="../static/page/report/report_simple.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/lib/graphic/graphic.js"></script>
    <script type="text/javascript" src="../static/page/report/report_simple.js"></script>
</head>
<body>



<div class="module">
    <div class="maintitle">
        <h1>{%$module.name%}测试报告</h1>
    </div>
    <div class="send_mail">
        <div class="send_mail_button">发送邮件</div>
    </div>


    {%if $module.funs %}
        <div class="content">
            <div class="title">
                <h3>升级的功能点</h3>
            </div>


                <table width="100%" align="center" cellpadding="10" cellspacing="5"  bgcolor ="#454545" border="1"  style="border-collapse:collapse;" >
                    <tr align="center" bgcolor="#19688c">
                        <td width="30%">升级的功能点</td>
                        <td width="70%">详细说明</td>
                    </tr>
                {%foreach $module.funs.funs as $key=>$fun%}
                    <tr>
                        <td>{%$fun%}</td>
                        <td>
                        {%foreach $module.funs.describes[$key] as $describe%}
                            <li>{%$describe%}</li>
                        {%/foreach%}
                        </td>
                    </tr>
                {%/foreach%}
                </table>

        </div>
    {%else%}
        <h1>升级的功能点为空</h1>
    {%/if%}

    {%* -------------  测试数据  ---------- *%}
    {%if $module.isTestData%}
        <div class="testdata">
            <div class="title">
                <h3>测试数据</h3>
            </div>
            <div class="datacontent">


                 {%if $module.manualTest%}
                     <div class="data_title">
                         <h4>自动化测试（单测）</h4>
                     </div>
                     <div class="data_class">
                         <h5>1.内容</h5>
                         {%include file="./widget/lContent.tpl" datas=$module.autoTest.content%}
                         <h5>2.覆盖率</h5>
                         <div id="coverage" style="margin-left:auto;margin-right:auto;width:700px;margin-bottom: 50px;">
                             <script type='text/javascript'>
                                 {%if $module.bugStatistic%}
                                       Ge.CreateChart({%$module.autoTest.covs%},{%$module.autoTest.versions%},"coverage","单测覆盖率","coverage %");
                                 {%/if%}
                             </script>
                         </div>
                         <h5>3.结论</h5>
                        {%include file="./widget/lContent.tpl" datas=$module.autoTest.result%}
                     </div>
                 {%/if%}


                 {%if $module.manualTest%}
                     <div class="data_title">
                         <h4>手工测试</h4>
                     </div>
                     <div class="data_class">
                         <h5>1.内容</h5>
                         {%include file="./widget/lContent.tpl" datas=$module.manualTest.content%}
                         <h5>2.结论</h5>
                         {%include file="./widget/lContent.tpl" datas=$module.manualTest.result%}
                     </div>
                 {%/if%}



                 {%if $module.bugStatistic%}
                     <div class="data_title">
                         <h4>bug统计</h4>
                     </div>
                     <div class="data_class">
                         <h5>1.趋势图</h5>
                         <div id="case_coverage" style="margin-left:auto;margin-right:auto;width:700px;margin-bottom: 50px;">
                         </div>
                         <div class="coverage">
                             <script type="text/javascript">
                                 {%if $module.bugStatistic%}
                                     Ge.CreateChart({%$module.bugStatistic.bugs%},{%$module.bugStatistic.versions%},"case_coverage","active bug统计","个数");
                                 {%/if%}
                             </script>
                         </div>
                         <h5>2.结论</h5>
                        {%include file="./widget/lContent.tpl" datas=$module.bugStatistic.result%}
                     </div>
                 {%/if%}



            </div>
        </div>
    {%/if%}

    {%* -------------  测试数据  ---------- *%}

    {%* -------------  测试结论  ---------- *%}
    {%if $module.result %}
    {%include file="./widget/gContent.tpl" datas=$module.result%}
    {%/if%}
    {%* -------------  测试结论  ---------- *%}


    {%* -------------  效率数据  ---------- *%}
    {%if $module.effi %}
    {%include file="./widget/gContent.tpl" datas=$module.effi%}
    {%/if%}
    {%* -------------  效率数据  ---------- *%}


    {%* -------------  补充说明  ---------- *%}
    {%if $module.declaration %}
    {%include file="./widget/gContent.tpl" datas=$module.declaration%}
    {%/if%}
    {%* -------------  补充说明  ---------- *%}

    <div class="send_mail">
        <div class="send_mail_button">发送邮件</div>
    </div>
</div>
<div class="tip">邮件发送成功</div>
<script type="text/javascript">
    $(".send_mail_button").click(function(){
        var width = $("body").width();
        $(".tip").css("left",width/2);
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
