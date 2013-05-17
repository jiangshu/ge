<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <style type="text/css">
        table{
            border-collapse:collapse;
            border: rgb(48, 214, 52) 2px dotted;
            font-family: "\5FAE\8F6F\96C5\9ED1", Helvetica;
        }

        table tr table{
            border: rgb(129, 129, 129) 1px dotted;
        }

        table tr table tr table{
            border: rgb(49, 73, 132) 1px dotted;
        }

        .bDot{
            width:15px;
            height:15px;
            display: inline-block;
            background: red;
            margin-left:5px;

        }

        .sDot{
            width:15px;
            height:15px;
            display: inline-block;
            background: #df132f;
            margin-right:5px;
        }

        h4{
            display: inline-block;
            color: #1558aa;
        }

        .subtitle{
            margin-left:30px;
            color:#c48c0a;
            font-size:18px
        }


    </style>
</head>
<body>
<h1 id="aaa" style="text-align: center;color:#0e0ff6;">{%$module.name%}测试报告</h1>
<div style="text-align: center;color:#ff1813;font-size:20px;font-weight:bold;margin-bottom:20px;">
    <a href="{%$report_full_url%}" style="text-decoration: none;padding:5px;color:#ff1813;">点击获取详细信息</a>
</div>

<table align="center" cellpadding="10" cellspacing="1" border="1" width="1000" >
{%if $module.funs %}
    {%$datas=$module.funs%}
    <tr>
        <td width="200"><h3>升级的功能点</h3></td>
        <td >
            <table width="100%" align="center" cellpadding="10" cellspacing="5"   border="1"  style="border-collapse:collapse;" >
                <tr align="center" bgcolor="#19688c" style="color:#ffc339">
                    <td width="30%">升级的功能点</td>
                    <td width="70%">详细说明</td>
                </tr>
                {%foreach $datas.funs as $key=>$fun%}
                    <tr>
                        <td>{%$fun%}</td>
                        <td>
                        {%foreach $datas.describes[$key] as $describe%}
                            <li>{%$describe%}</li>
                        {%/foreach%}
                        </td>
                    </tr>
                {%/foreach%}
            </table>
        </td>
    </tr>
{%/if%}

{%if $module.isTestData%}
    <tr>
        <td width="200"><h3>测试数据</h3></td>
        <td>
            <table  width="100%" align="center" cellpadding="10" cellspacing="5"  style="border-collapse:collapse;"  >
            {%if $module.manualTest%}
                {%$datas = $module.manualTest%}
                <tr>
                    <td><div class="sDot"></div><h4>手工测试</h4></td>
                </tr>
                <tr>
                    <td>
                        <div class="subtitle">
                            1.内容
                        </div>
                       {%include file="./widget/lSContent.tpl" datas=$datas.content%}

                        <div class="subtitle">
                            2.结论
                        </div>
                        {%include file="./widget/lSContent.tpl" datas=$datas.result%}
                    </td>
                </tr>
            {%/if%}


            {%if $module.autoTest%}
            {%$datas = $module.autoTest%}
                <tr>
                    <td><div class="sDot"></div><h4>自动化测试</h4></td>
                </tr>
                <tr>
                    <td>
                        <div class="subtitle">
                            1.内容
                        </div>
                       {%include file="./widget/lSContent.tpl" datas=$datas.content%}

                        <div class="subtitle">
                            2.覆盖率
                        </div>
                        <div style="margin-top:10px;margin-bottom:20px;">
                            <table  width="800" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">版本</td>
                                {%foreach $datas.versions as $version%}
                                    <td>{%$version%}</td>
                                {%/foreach%}
                                </tr>
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">覆盖率</td>
                                {%$tmp=0%}
                                {%foreach $datas.covs as $cov%}
                                {%if $tmp gt $cov%}
                                    <td style="color:red">{%$cov%}%↓</td>
                                {%else%}
                                    <td>{%$cov%}%↑</td>
                                {%/if%}
                                {%$tmp=$cov%}
                                {%/foreach%}
                                </tr>
                            </table>
                        </div>

                        <div class="subtitle">
                            3.结论
                        </div>
                       {%include file="./widget/lSContent.tpl" datas=$datas.result%}

                    </td>
                </tr>
            {%/if%}


            {%if $module.bugStatistic%}
            {%$datas = $module.bugStatistic%}
                <tr>
                    <td><div class="sDot"></div><h4>Active bug统计</h4></td>
                </tr>
                <tr>
                    <td>
                        <div class="subtitle">
                            1.active bug统计
                        </div>
                        <div style="margin-top:10px;margin-bottom:20px;">
                            <table  width="800" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">版本</td>
                                {%foreach $datas.versions as $version%}
                                    <td>{%$version%}</td>
                                {%/foreach%}
                                </tr>
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">bug数目</td>
                                {%$tmp=0%}
                                {%foreach $datas.bugs as $bug%}
                                {%if $tmp gt $bug%}
                                    <td style="color:red">{%$bug%}↓</td>
                                {%else%}
                                    <td>{%$bug%}↑</td>
                                {%/if%}
                                {%$tmp=$bug%}
                                {%/foreach%}
                                </tr>
                            </table>
                        </div>

                        <div class="subtitle">
                            2.结论
                        </div>
                    {%include file="./widget/lSContent.tpl" datas=$datas.result%}

                    </td>
                </tr>
            {%/if%}


            </table>
        </td>
    </tr>
{%/if%}



{%if $module.result %}
{%$datas=$module.result%}
<tr>
    <td><h3>测试结论</h3></td>
    <td>
        <ul>
        {%foreach $datas.data as $item%}
            <li>{%$item%}</li>
        {%/foreach%}
        </ul>
    </td>
</tr>
{%/if%}


{%if $module.effi %}
{%$datas=$module.effi%}
<tr>
    <td ><h3>效率数据</h3></td>
    <td>
        <ul>
        {%foreach $datas.data as $item%}
            <li>{%$item%}</li>
        {%/foreach%}
        </ul>
    </td>
</tr>
{%/if%}


{%if $module.declaration %}
{%$datas=$module.declaration%}
<tr>
    <td><h3>说明</h3></td>
    <td>
        <ul style="color:red">
        {%foreach $datas.data as $item%}
            <li>{%$item%}</li>
        {%/foreach%}
        </ul>
    </td>
</tr>
{%/if%}
</table>
<div style="text-align: center;color:#ff1813;font-size:20px;font-weight:bold;margin-bottom:20px;margin-top:20px;">
    <a href="{%$report_full_url%}" style="text-decoration: none;padding:5px;color:#ff1813;">点击获取详细信息</a>
</div>
</body>
</html>
