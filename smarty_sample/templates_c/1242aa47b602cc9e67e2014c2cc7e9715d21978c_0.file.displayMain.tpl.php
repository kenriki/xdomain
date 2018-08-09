<?php
/* Smarty version 3.1.32, created on 2018-07-08 17:25:22
  from '/home/kenriki/kenriki.php.xdomain.jp/public_html/smarty_sample/templates/displayMain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b41ca72e58986_17517977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1242aa47b602cc9e67e2014c2cc7e9715d21978c' => 
    array (
      0 => '/home/kenriki/kenriki.php.xdomain.jp/public_html/smarty_sample/templates/displayMain.tpl',
      1 => 1531038240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b41ca72e58986_17517977 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/kenriki/kenriki.php.xdomain.jp/public_html/smarty_sample/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/home/kenriki/kenriki.php.xdomain.jp/public_html/smarty_sample/libs/plugins/function.html_table.php','function'=>'smarty_function_html_table',),));
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<style>
html,body {
  background-color: rgb(199,199,199);
}
table {
  border-collapse:collapse;
  border-bottom: 1px #000 soild;
}
</style>
<title>smartyのテスト</title>
</head>
<body>
<h1>Smarty 練習用</h1>

<p>IPアドレス: <?php echo $_smarty_tpl->tpl_vars['ipAddres']->value;?>
</p>
<p>ブラウザ情報: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p>



今日は<?php echo smarty_modifier_date_format(time(),'%Y / %m / %d %H:%M:%S');?>
です。 

<br>
<?php echo smarty_function_html_table(array('loop'=>$_smarty_tpl->tpl_vars['data']->value,'cols'=>2,'table_attr'=>'border="0"'),$_smarty_tpl);?>




<table>
<tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['personal_th']->value, 'var');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['var']->value) {
?>
<th><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</th>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tr>
<tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['personaldata']->value, 'var');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['var']->value) {
?>
<td><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</td>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tr>
</table>




</body>
</html><?php }
}
