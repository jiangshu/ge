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
            border: rgb(233, 233, 233) 1px dotted;
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


    </style>
</head>
<body>
<h1 id="aaa" style="text-align: center;color:#0e0ff6;">{%$module.name%}测试报告</h1>
<div style="text-align: center;color:#ff1813;font-size:20px;font-weight:bold;margin-bottom:20px;">
    <a href="{%$report_full_url%}" style="text-decoration: none;padding:5px;color:#ff1813;">点击获取详细信息</a>
</div>

<table align="center" cellpadding="10" cellspacing="1" border="1" width="1000" >
{%if $module.data.content.funs %}
{%$datas=$module.data.content.funs%}
    <tr>
        <td width="200"><h3>升级的功能点</h3></td>
        <td >
            <ul>
                {%foreach $datas.data as $item%}
                    <li>{%$item%}</li>
                {%/foreach%}
            </ul>
        </td>
    </tr>
{%/if%}

    <tr>
        <td width="200"><h3>测试数据</h3></td>
        <td>
            <table  width="100%" align="center" cellpadding="10" cellspacing="5"  style="border-collapse:collapse;"  >
            {%if $module.data.testdata.bugs%}
            {%$datas = $module.data.testdata.bugs%}
                <tr>
                    <td><div class="sDot"></div><h4>bug数和分布</h4></td>
                </tr>
                <tr>
                    <td>
                         <table  width="700" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
                             <tr bgcolor="#19688c" align="center" style="color:#ffc339">
                                 <td width="50%">功能</td>
                                 <td width="15%">bug总数</td>
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
                    </td>
                </tr>
            {%/if%}


            {%if $module.data.testdata.diffs%}
            {%$datas = $module.data.testdata.diffs%}
                <tr>
                    <td> <span class="sDot"></span><h4>diff结果</h4></td>
                </tr>
                <tr>
                    <td>

                    {%foreach $datas as $product_name => $data%}
                        <div style="color:#2a89ea;margin-left:20px;font-weight:bold;font-size:18px;">^{%$product_name%}产品线</div>
                        <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:16px;margin-top:20px;margin-bottom:10px">@ 新发布版本与上一版本编译时间对比:</div>
                        <div class="diff_table">
                            <table width="700" align="center" border="1" cellpadding="2" cellspacing="1" style="border-collapse:collapse;">
                                <thead>
                                <tr bgcolor="#19688c" align="center" style="color:#ffc339">
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

                    {%/foreach%}

                        <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:16px;margin-top:20px;margin-bottom:10px">@ diff结论</div>
                        <div class="data_content">
                            <ul>
                            {%foreach $module.data.testdata.else.diffResult as $item%}
                                <li>{%$item%}</li>
                            {%/foreach%}
                            </ul>
                        </div>

                    </td>
                </tr>
             {%/if%}


            {%if $module.data.testdata.cov%}
            {%$datas = $module.data.testdata.cov%}
                <tr  >
                    <td><span class="sDot"></span><h4>覆盖率</h4></td>
                </tr>
                <tr>
                    <td>
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

                        <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:16px;margin-top:20px;margin-bottom:10px">@ coverage结论</div>
                        <div class="data_content">
                            <ul>
                            {%foreach $module.data.testdata.else.covResult as $item%}
                                <li>{%$item%}</li>
                            {%/foreach%}
                            </ul>
                        </div>

                    </td>
                </tr>
            {%/if%}

            {%if $module.data.testdata.else.isCaseStatistic%}
                <tr  >
                    <td><span class="sDot"></span><h4>本版本自动化case添加个数</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            {%foreach $module.data.testdata.else.caseStatistic as $item%}
                                <li>{%$item%}</li>
                            {%/foreach%}
                        </ul>
                    </td>
                </tr>
            {%/if%}

            {%if $module.data.testdata.else.isStartScript%}
                <tr >
                    <td><span class="sDot"></span><h4>Start.sh脚本</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            {%foreach $module.data.testdata.else.startScript as $item%}
                                <li>{%$item%}</li>
                            {%/foreach%}
                        </ul>
                    </td>
                </tr>
            {%/if%}

            {%if $module.data.testdata.else.is_CI_Sample%}
                <tr >
                    <td><span class="sDot"></span><h4>CI、sample自动化是否全部通过</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            {%foreach $module.data.testdata.else.CI_Sample as $item%}
                                <li>{%$item%}</li>
                            {%/foreach%}
                        </ul>

                    </td>
                </tr>
            {%/if%}


            {%if $module.data.testdata.else.isCompile%}
                <tr >
                    <td><span class="sDot"></span><h4>是否在编译机上运行（用于保证产品线使用编辑机环境正常</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            {%foreach $module.data.testdata.else.compile as $item%}
                                <li>{%$item%}</li>
                            {%/foreach%}
                        </ul>
                    </td>
                </tr>
            {%/if%}
            </table>
        </td>
    </tr>

{%if $module.data.content.result %}
{%$datas=$module.data.content.result%}
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


{%if $module.data.content.effi %}
{%$datas=$module.data.content.effi%}
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


{%if $module.data.content.exp %}
{%$datas=$module.data.content.exp%}
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
