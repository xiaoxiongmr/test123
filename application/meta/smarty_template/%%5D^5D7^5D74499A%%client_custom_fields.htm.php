<?php /* Smarty version 2.6.19, created on 2016-11-15 10:22:16
         compiled from client_custom_fields.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style>
/*.main-div label {
    width: 60px!important;
}
.main-div {
    border-top: 0px solid #e5e5e5;
}*/
</style>
<!-- <div class="custom_field"> -->
<div class="main-div" id="_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
" style="border:0px solid gray;margin:-10px 0px 0px -10px;padding-bottom:10px;">
	<?php if ($this->_tpl_vars['edit_field_confirm']): ?>
	<?php $_from = $this->_tpl_vars['edit_field_confirm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['field_info']):
        $this->_foreach['list_name']['iteration']++;
?>
	<?php if (($this->_foreach['list_name']['iteration']-1)%2 == 0): ?>
	<div class="control-group" >
	<?php endif; ?>
		<label style="width: 55px!important;">
		<span class='easyui-tooltip' title="是否启用" data-options="position:'left'"><input type="checkbox" fields='<?php echo $this->_tpl_vars['field_info']['fields']; ?>
' <?php if ($this->_tpl_vars['field_info']['state'] == 1): ?>checked<?php endif; ?> /></span>
		</label>
        <input type="text" id="_<?php echo $this->_tpl_vars['field_info']['fields']; ?>
" maxlength="50" value="<?php echo $this->_tpl_vars['field_info']['name']; ?>
" <?php if ($this->_tpl_vars['field_info']['state'] == 0): ?> readonly <?php endif; ?> />
        <button class="btn" title="自定义字段 - 详细设置" onclick="_set_options('<?php echo $this->_tpl_vars['field_info']['id']; ?>
');" style="margin-left: -3px;">
        <i class="glyphicon glyphicon-tasks"></i>
    	</button>
	<?php if (($this->_foreach['list_name']['iteration']-1)%2 != 0): ?>
	</div>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</div>
<div align="center"  style="padding-top:20px;padding-bottom:10px;">
<button class="new_con_btn" type="button" onclick="_add_field();" style="margin-left:70px;" id="_field_add_row_<?php echo $this->_tpl_vars['field_type']; ?>
" title="添加新字段">
    <span class="iconfont">&#xe626;&nbsp;<span class="btn-size">添加</span></span> 
</button>
<button class="new_con_btn" type="button" onclick="_delete_field();" id="_field_del_row_<?php echo $this->_tpl_vars['field_type']; ?>
" title="删除最后一行">
    <span class="iconfont">&#xe61b;&nbsp;<span class="btn-size">删除</span></span> 
</button>
<button class="new_con_btn" type="button" onclick="_save_field();" id="_field_confirm_save_<?php echo $this->_tpl_vars['field_type']; ?>
" title="确定 - 保存配置">
    <span class="iconfont">&#xe637;&nbsp;<span class="btn-size">保存配置</span></span> 
</button>
<span id='_field_save_tip_<?php echo $this->_tpl_vars['field_type']; ?>
' style='color:red;'></span>
</div>
<!-- </div> -->

<div id="_field_confirm_options_<?php echo $this->_tpl_vars['field_type']; ?>
"></div> <!-- 自定义字段详细设置  -->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	//checkbox的onclick事件
	$('#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
 input[type="checkbox"]').click(function(){
		var fields = $(this).attr('fields');
		if($(this).attr('checked')=='checked')
		{
			$("#_"+fields+"").attr('readonly',false);
		}
		else
		{
			$("#_"+fields+"").attr('readonly',true);
		}
	});
});

/**
 * 选项配置
 * @param field_id
 * @private
 */
function _set_options(field_id)
{
	$('#_field_confirm_options_<?php echo $this->_tpl_vars['field_type']; ?>
').window({
		href:"index.php?c=client_custom_fields&m=field_option_setting&field_id="+field_id,
		top:100,
		width:530,
		// height:220,
		title:"自定义字段 - 详细设置",
		shadow:false,
		collapsible:false,
		minimizable:false,
		maximizable:false,
		resizable:false,
		cache:false
	});
}

/**
 * 添加字段
 */
function _add_field()
{
	$('#_field_add_row_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',true);
	$.ajax({
		type:'POST',
		url: 'index.php?c=field_confirm&m=add_two_empty_fields',
		data: {'field_type':'<?php echo $this->_tpl_vars['field_type']; ?>
'},
		dataType: 'json',
		success: function(responce){
			if(responce["error"] == 0)
			{
				var unit_info1={};
				unit_info1.id = responce['id1'];
				unit_info1.fields = responce['fields1'];
				unit_info1.custom_poz = responce['custom_poz1'];
				unit_info1.name = responce['name1'];
				var unit_info2={};
				unit_info2.id = responce['id2'];
				unit_info2.fields = responce['fields2'];
				unit_info2.custom_poz = responce['custom_poz2'];
				unit_info2.name = responce['name2'];
				var tr = $('\
				        <div class="control-group" > \
                            <label style="width: 55px!important;"> \
                                <span class="easyui-tooltip tooltip-f" title="是否启用" data-options="position:\'left\'"> \
                                    <input type="checkbox" fields="'+unit_info1.fields+'" /> \
                                </span>\
                            </label> \
                                <input type="text" id="_'+unit_info1.fields+'"  maxlength="25" value="'+unit_info1.name+'" readonly/> \
                                <button class="btn" title="自定义字段 - 详细设置" onclick="_set_options(\''+unit_info1.id+'\');" style="margin-left: -3px;"> \
                                   <i class="glyphicon glyphicon-tasks"></i>\
                                </button> \
                            <label style="width: 55px!important;">\
                                <span class="easyui-tooltip tooltip-f" title="是否启用" data-options="position:\'left\'"> \
                                    <input type="checkbox" fields="'+unit_info2.fields+'"/>\
                                </span>\
                            </label> \
			                    <input type="text" id="_'+unit_info2.fields+'"  maxlength="25" value="'+unit_info2.name+'" readonly/> \
			                    <button class="btn" title="自定义字段 - 详细设置" onclick="_set_options(\''+unit_info2.id+'\');" style="margin-left: -3px;"> \
                                   <i class="glyphicon glyphicon-tasks"></i> \
                                </button> \
				        </div>');
				$('input[type="checkbox"]',tr).click(function(){
					var fields = $(this).attr('fields');
					if($(this).attr('checked')=='checked')
					{
						$("#_"+fields+"").attr('readonly',false);
					}
					else
					{
						$("#_"+fields+"").attr('readonly',true);
					}
				});
				tr.appendTo('#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
');

				$('#_field_add_row_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',false);
			}
			else
			{
				$.messager.alert('错误',responce['message'],'error');
			}
		}
	});
}

/**
 * 删除自定义字段最后一行
 */
function _delete_field()
{
	var field_type = '<?php echo $this->_tpl_vars['field_type']; ?>
';
	if(field_type==0)
	{
		var control_flag = 12;//客户的初始自定义字段为12个
	}
	else if(field_type==1)
	{
		var control_flag = 10;//联系人初始有10个自定义字段
	}
	else if(field_type==2)
	{
		var control_flag = 12;//产品初始有12个自定义字段
	}
	else if(field_type==3)
	{
		var control_flag = 0;//订单初始有0个自定义字段
	}
	else if(field_type==4)
	{
		var control_flag = 0;//客服服务 初始有0个自定义字段
	}

	$('#_field_del_row_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',true);

	//判断删除的是否为系统基础字段
	var size = $("#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
 input[type=checkbox]").size();
	if(size <= control_flag)
	{
		$.messager.alert("提示","系统初始字段，不能删除！");
		$('#_field_del_row_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',false);
		return false;
	}

	//要删除的字段
	var first_unit = $("#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
 input[type=checkbox]").eq(size-1).attr('fields');
	var second_unit = $("#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
 input[type=checkbox]").eq(size-2).attr('fields');

	var _data = {};
	_data.field_type = field_type;
	_data.first_unit   = first_unit; //字段表对应field
	_data.second_unit   = second_unit; //字段表对应field

	$.messager.confirm("提示","将删除自定义字段最后一行<br>是否继续？",function(r){
		if(r)
		{console.log(r);
			$.ajax({
				type:'POST',
				url: "index.php?c=field_confirm&m=delete_create_field",
				data: _data,
				dataType: "json",
				success: function(responce){
					console.log(1111);
					if(responce["error"] == 0)
					{
						$("#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
 div:last-child").remove();
					}
					else
					{
						$.messager.alert('错误',responce["message"],'error');
					}

					$('#_field_del_row_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',false);
				}
			});
		}
		else
		{
			$('#_field_del_row_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',false);
		}
	});
}

/**
*  保存配置
*/
function _save_field()
{
	var _data = {}
	$("#_table_field_confirm_<?php echo $this->_tpl_vars['field_type']; ?>
 input[type=checkbox]").each(function(){
		var fields = $(this).attr('fields');
		if(typeof(fields) != 'undefined' && fields != "" )
		{
			var if_select = $(this).attr('checked');
			var field_value = $('#_'+fields).val();
			_data[fields] = if_select+"|"+field_value;
		}
	});

	if( !empty_obj(_data) )
	{
		$('#_field_confirm_save_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',true);
		$.ajax({
			type:'POST',
			url: "index.php?c=field_confirm&m=update_fields_confirm",
			data: {"_data":_data,"field_type":'<?php echo $this->_tpl_vars['field_type']; ?>
'},
			dataType: "json",
			success: function(responce)
            {
				if(responce["error"] == 0)
				{
					<?php if (! $this->_tpl_vars['if_refesh']): ?>
					window.location.reload();
					<?php endif; ?>
					$("#_field_save_tip_<?php echo $this->_tpl_vars['field_type']; ?>
").html("<img src='./themes/default/icons/ok.png' />&nbsp;保存配置成功");
					setTimeout(function(){
						$("#_field_save_tip_<?php echo $this->_tpl_vars['field_type']; ?>
").html("");
						$('#set_field_confirm').window('close');
					},3000);
				}
				else
				{
					$.messager.alert('错误','保存失败','error');
				}

				$('#_field_confirm_save_<?php echo $this->_tpl_vars['field_type']; ?>
').attr('disabled',false);
			}
		});
	}
	else
	{
		$('#set_field_confirm').window('close');
	}
}
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>