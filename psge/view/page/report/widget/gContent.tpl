<div class="content">
    <div class="title">
        <h3>{%$datas.title%}</h3>
    </div>
    <div class="text">
        <ul>
        {%foreach $datas.data as $item%}
            <li>{%$item%}</li>
        {%/foreach%}
        </ul>
    </div>
</div>