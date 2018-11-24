<?php
/* Smarty version 3.1.32, created on 2018-11-24 10:16:38
  from 'C:\Apache24\htdocs\public_html\smarty_sample\templates\displayMain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf8a676a210e5_70054998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dca6c5ae9e892b35eda98e73050300599b880a8' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\public_html\\smarty_sample\\templates\\displayMain.tpl',
      1 => 1543022189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf8a676a210e5_70054998 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'c:\\xampp\\htdocs\\smarty_sample\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'c:\\xampp\\htdocs\\smarty_sample\\libs\\plugins\\function.html_table.php','function'=>'smarty_function_html_table',),));
?>


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


<?php }
}
