


<p>IPアドレス: {$ipAddres}</p>
<p>ブラウザ情報: {$name}</p>



今日は{$smarty.now|date_format:'%Y / %m / %d %H:%M:%S'}です。 

<br>
{html_table loop=$data cols=2 table_attr='border="0"'}



<table>
    <tr>
    {foreach from=$personal_th item=var}
    <th>{$var}</th>
    {/foreach}
    </tr>
    <tr>
    {foreach from=$personaldata item=var}
    <td>{$var}</td>
    {/foreach}
    </tr>
</table>


