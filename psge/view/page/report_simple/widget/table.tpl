<table  width="700" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
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