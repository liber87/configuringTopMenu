<?php
	if(!defined('MODX_BASE_PATH')){die('What are you doing? Get out of here!');}
	
	if ($modx->Event->name=='OnPageNotFound')
	{
		if ($_REQUEST['q']=='configuringTopMenu')
		{
			
			function set_config($mmenu)
			{
				$text = "<?php".PHP_EOL.'$mmenu='.var_export($mmenu,1).';';		
				$f=fopen(MODX_BASE_PATH."assets/plugins/configuringTopMenu/custom.config.php",'w');
				fwrite($f,$text);
				fclose($f);	
			}
			function compare ($v1, $v2) {				
				if ($v1[9] == $v2[9]) return 0;
				return ($v1[9] < $v2[9])? -1: 1;
			}
					
			
			if (!isset($_GET['parent']))$parent='main';
			else $parent = $_GET['parent'];
			
			if (!file_exists(MODX_BASE_PATH."assets/plugins/configuringTopMenu/custom.config.php"))
			{
				require MODX_BASE_PATH . 'assets/plugins/configuringTopMenu/default.config.php';
				set_config($mmenu_default);
			}
			require MODX_BASE_PATH . 'assets/plugins/configuringTopMenu/custom.config.php';
			
			if (isset($_POST['set_config']))
			{
				if ($mmenu[$_POST['id']]) $name = $_POST['id'];
				else $name = 'custom_'.time();
				
				$mmenu[$name]['title'] = $_POST['title'];
				$mmenu[$name]['roles'] = $_POST['roles'];
				$mmenu[$name]['manager_ids'] = $_POST['manager_ids'];
				if ($name!=$_POST['id'])
				{
					if ($_POST['use']=='default')
					{
						require MODX_BASE_PATH . 'assets/plugins/configuringTopMenu/default.config.php';
						$mmenu[$name]['items'] = $mmenu_default['general']['items'];
					}
					else $mmenu[$name]['items'] = array();
					$_SESSION['settings_menu_name'] = $_POST['id'];
				}
				set_config($mmenu);				
			}
			
			if (isset($_GET['config'])) $_SESSION['settings_menu_name'] = $_GET['config'];
			
			if (!$_SESSION['settings_menu_name']) $settings_menu_name = 'general';
			else $settings_menu_name = $_SESSION['settings_menu_name'];
			
			
			if (isset($_GET['set_position']))
			{
				$mmenu[$settings_menu_name]['items'][$_GET['id1']][9] = $_GET['val2'];
				$mmenu[$settings_menu_name]['items'][$_GET['id2']][9] = $_GET['val1'];
				set_config($mmenu);
				
			}
			if (isset($_GET['del_position']))
			{
				if (isset($mmenu[$settings_menu_name]['items'][$_GET['del_position']]))
				{	
					unset($mmenu[$settings_menu_name]['items'][$_GET['del_position']]);
					set_config($mmenu);
				}
				
			}
			
			if (isset($_GET['add']))
			{
				$id = 'custom_'.time();
				
				$item = array (
				0 => $id,
				1 => $parent,
				2 => 'Untitled item',
				3 => 'javascript:;',
				4 => 'Untitled item',
				5 => ' return false;',
				6 => ' return false;',
				7 => '',
				8 => 0,
				9 => time(),
				10 => '',
				);
				$mmenu[$settings_menu_name]['items'][$id] = $item;
				set_config($mmenu);
				
			}
			
			
			
			if ($_POST['action']=='edit')
			{
				$mmenu[$settings_menu_name]['items'][$_POST['id']] = $_POST[$_POST['id']];
				set_config($mmenu);					
			}
								
			
			if (!$mmenu[$settings_menu_name]) $settings_menu_name = 'general';
			$mmenu_items = $mmenu[$settings_menu_name]['items'];
			if (count($mmenu_items)) uasort($mmenu_items, "compare");
			$title = $mmenu[$settings_menu_name]['title'];	
			
			
			
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="/<?=MGR_DIR;?>/media/style/<?=$modx->config['manager_theme'];?>/style.css" />
				<script src="<?=MGR_DIR;?>/media/script/jquery/jquery.min.js" type="text/javascript"></script>				
				<style>
					.name i{margin-right:10px; margin-left:10px;}
					.config{display: block !important;float: right;cursor: pointer;font-size: 15px !important;width: 31px !important;height: 26px;line-height: 26px;margin-top: -6px;margin-right: -11px !important;border-left: 1px solid lightgrey;}
					.up,.down,.open_edit_window{cursor:pointer;}
				</style>
				<script>
					function reload_table()
					{
					$('.tab-page').animate({"opacity":"0.7"},300);
					console.log(location.href);
					$.get(location.href, function(result){
					var data = $(result).filter(".tab-page").html();						
					$(".tab-page").html(data);
					$('.tab-page').animate({"opacity":"1"},300);
					});
					}
					document.addEventListener('DOMContentLoaded', function(){
					$(document).on('click','.open_edit_window',function(e){							
					e.preventDefault;
					var t = $(this).data('href');
					if  ($(t).hasClass('in')) $(t).removeClass('in');
					else $(t).addClass('in');
					return false;
					});
					
					$(document).on('click','.up',function(e){
					e.preventDefault;
					var cur_ix = $(this).closest('tr').data('index');
					var cur_id = $(this).closest('tr').data('id');
					var prev_ix = $(this).closest('tr').prev().prev().data('index');
					var prev_id = $(this).closest('tr').prev().prev().data('id');
					if (prev_id)
					{
					var url = 'configuringTopMenu?set_position&id1='+cur_id+'&val1='+cur_ix+'&id2='+prev_id+'&val2='+prev_ix;						
					$.get(url,reload_table);						
					}
					return false;
					});
					$(document).on('click','.down',function(e){
					e.preventDefault;
					var cur_ix = $(this).closest('tr').data('index');
					var cur_id = $(this).closest('tr').data('id');
					var next_ix = $(this).closest('tr').next().next().data('index');
					var next_id = $(this).closest('tr').next().next().data('id');
					if (next_id)
					{
					var url = 'configuringTopMenu?set_position&id1='+cur_id+'&val1='+cur_ix+'&id2='+next_id+'&val2='+next_ix;						
					$.get(url,reload_table);
					}
					return false;
					});
					$(document).on('click','.del',function(e){
					e.preventDefault;
					var url = 'configuringTopMenu?del_position='+$(this).data('id');
					$.get(url,reload_table);
					return false;
					});
					
					$(document).on('click','.add',function(e){
					e.preventDefault;
					var url = 'configuringTopMenu?add';
					$.get(url,reload_table);
					return false;
					});
					
					
					$(document).on("submit",".edit_form",function(e){
					e.preventDefault();	
					$('.tab-page').animate({"opacity":"0.7"},300);
					$.ajax({
					type: 'post',
					url: location.href,
					data: $(this).serialize(),								
					success: function(result){
					var data = $(result).filter(".tab-page").html();						
					$(".tab-page").html(data);
					$('.tab-page').animate({"opacity":"1"},300);
					}
					});
					});
					$('.add_new_config').click(function(){
					$('#new_config input[name=id]').val('')
					$('#new_config input[name=title]').val('')
					$('#new_config input[name=roles]').val('')
					$('#new_config input[name=manager_ids]').val('');
					$('#new_config .use').show('');
					
					$('#new_config .modal-title').html('Новая конфигурация');
					
					$('#new_config').show();
					});
					$('.close').click(function(){
					$('.modal').hide();
					});
					$('.config').click(function(e){
					e.preventDefault;
					$('#new_config input[name=id]').val($(this).data('id'))
					$('#new_config input[name=title]').val($(this).data('title'))
					$('#new_config input[name=roles]').val($(this).data('roles'))
					$('#new_config input[name=manager_ids]').val($(this).data('manager_ids'))
					$('#new_config .modal-title').html('Редактирование конфигурации');
					$('#new_config .use').hide('');
					$('#new_config').show();
					return false;
				});
			});
		</script>
	</head>	
	<body>
		<h1><i class="fa fa-cubes"></i>Настройка верхнего меню</h1>
		<div id="actions">
			<div class="btn-group">
				<a class="btn btn-secondary add" href="javascript:;">
					<i class="fa fa-clone"></i>
					<span>Добавить пункт меню</span>
				</a>
				<div class="btn-group dropdown">
					<a id="Button1" class="btn btn-success" href="javascript:;">
						<i class="fa fa-floppy-o"></i><span><?php echo $title;?></span>
					</a>
					<span class="btn btn-success plus dropdown-toggle" onclick="$(this).next().toggle();"></span>			
					<div class="dropdown-menu">
						
						<?php
							foreach($mmenu as $key => $item)
							{						
								
								echo '<span class="btn btn-block">
								<i class="fa fa-file-o"></i>';
								if ($settings_menu_name!=$key) echo '<a href="configuringTopMenu?config='.$key.'">';
								echo '<span>'.$item['title'].'</span>';
								if ($settings_menu_name!=$key) echo '</a>';
								echo '<i class="fa fa-cog config" 										
								data-id="'.$key.'"
								data-title="'.$item['title'].'"
								data-roles="'.$item['roles'].'"
								data-manager_ids="'.$item['manager_ids'].'"
								"></i> 
								</span>';
							}
						?>
						
						<span class="btn btn-block add_new_config"><i class="fa fa-pencil"></i> 
							<span>Создать новую</span>									
						</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tab-page">
			<div class="table-responsive">
				<table class="table data" cellpadding="1" cellspacing="1">
					<thead>
						<tr>
							
							<td class="tableHeader">Название </td>
							<td class="tableHeader">Ссылка </td>
							
							<td class="tableHeader" width="120">Действия</td>
						</tr>
					</thead>
					<tbody>
						<?php				
							if ($parent!='main')
							{
								if (trim($item[7])=='main') $link = 'configuringTopMenu?parent='.trim($item[7]);
								else $link = 'configuringTopMenu';
								
								echo '<tr><td class="tableItem name" colspan="3"><a href="'.$link.'">На уровень выше</a></td></tr>';
							}									
							foreach($mmenu_items as $key => $item)
							{
								
								if ($item[1]!=$parent) continue;
								
							?>
							<tr data-index="<?php echo $item[9];?>" data-id="<?php echo $key;?>">
								
								<td class="tableItem name">
									<?php echo '<a href="configuringTopMenu?parent='.trim($item[0]).'">'.$item[2].'</a>';?>
								</td>
								<td class="tableItem">
									<?php echo $item[3];?>
								</td>
								
								<td class="tableItem" align="center" width="120">
									<div class="actions text-center text-nowrap">
										<a title="Редатировать" data-href=".<?php echo $key;?>" class="open_edit_window"  href="javasctipt:;"><i class="fa fa-pencil-square-o"></i></a>
										
										<a title="Наверх" class="up" href="javasctipt:;"><i class="fa fa-arrow-up"></i></a>
										
										<a title="Вниз" class="down"  href="javasctipt:;"><i class="fa fa-arrow-down"></i></a>
										
										<a  href="javasctipt:;" class="del" title="Удалить" data-id="<?php echo $key;?>"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>
							<tr class="resource-overview-accordian collapse <?php if ((($_POST['action']=='edit') and ($_POST['id']==$key)) or ($key==$id)) echo 'in ';?><?php echo $key;?>" data-index="<?php echo $item[9];?>">
								<td colspan="3">
									<div class="overview-body text-small">
										<form method="post" action="" class="edit_form">
											<input type="hidden" name="id" value="<?php echo $key;?>">
											<input type="hidden" name="action" value="edit">
											<div class="row">
												<div class="col">
													<div class="form-group">
														<label>ID</label>
														<input type="text" name="<?php echo $key;?>[0]" class="form-control" value="<?php echo $item[0];?>">
													</div>
													<div class="form-group">
														<label>Parent</label>
														<input type="text" name="<?php echo $key;?>[1]" class="form-control" value="<?php echo $item[1];?>">
													</div>
													<div class="form-group">
														<label>Text</label>
														<input type="text" name="<?php echo $key;?>[2]" class="form-control" value="<?php echo htmlspecialchars($item[2]);?>">
													</div>
													<div class="form-group">
														<label>Link</label>
														<input type="text" name="<?php echo $key;?>[3]" class="form-control" value="<?php echo $item[3];?>">
													</div>
													<div class="form-group">
														<label>Alt</label>
														<input type="text" name="<?php echo $key;?>[4]" class="form-control" value="<?php echo $item[4];?>">
													</div>
													<div class="form-group">
														<label>onClick</label>
														<input type="text" name="<?php echo $key;?>[5]" class="form-control" value="<?php echo $item[5];?>">
													</div>																												
												</div>
												<div class="col">
													<div class="form-group">
														<label>x3</label>
														<input type="text" name="<?php echo $key;?>[6]" class="form-control" value="<?php echo $item[6];?>">
													</div>
													<div class="form-group">
														<label>Target</label>
														<input type="text" name="<?php echo $key;?>[7]" class="form-control" value="<?php echo $item[7];?>">
													</div>
													<div class="form-group">
														<label>x3</label>
														<input type="text" name="<?php echo $key;?>[8]" class="form-control" value="<?php echo $item[8];?>">
													</div>
													<div class="form-group">
														<label>Menuindex</label>
														<input type="text" name="<?php echo $key;?>[9]" class="form-control" value="<?php echo $item[9];?>">
													</div>
													<div class="form-group">
														<label>x3</label>
														<input type="text" name="<?php echo $key;?>[10]" class="form-control" value="<?php echo $item[10];?>">
													</div>																											
													<div class="form-group">
														<button type="submit" class="btn btn-block btn-success" style="margin-top:25px;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</td>
							</tr>
							<?
								$top = false;
							}
						?>
					</tbody>
				</table>						
			</div>									
		</div>	
		
		<div class="modal in" tabindex="-1" role="dialog" id="new_config">
			<div class="modal-dialog" role="document">
				<form method="post" action="">						
					<input type="hidden" name="set_config" value="true">
					<input type="hidden" name="id" value="">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Новая конфигурация</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<div class="form-group">
								<label>Название</label>
								<input type="text" name="title" class="form-control" value="">
							</div>
							
							
							<div class="form-group">
								<label>ID's roles</label>
								<input type="text" name="roles" class="form-control" value="">
							</div>
							
							
							<div class="form-group">
								<label>ID's managers</label>
								<input type="text" name="manager_ids" class="form-control" value="">
							</div>
							
							<div class="form-group use">
								<label>Использовать</label>
								<select class="form-control" name="use">
									<option value="default">Конфигурацию по умолчанию</option>
									<option value="empty">Пустую</option>
								</select>
								
							</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary close" data-dismiss="modal">Закрыть</button>
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
	</body>
</html>	
<?
	exit();
}
}
if ($modx->Event->name=='OnManagerMenuPrerender')
{ 
	if (file_exists(MODX_BASE_PATH."assets/plugins/configuringTopMenu/custom.config.php"))
	{
		require MODX_BASE_PATH . 'assets/plugins/configuringTopMenu/custom.config.php';
		$nkid = '';
		foreach($mmenu as $key => $item)
		{
			if (!$item['manager_ids']) $nkid = $key;
			if ($item['manager_ids'])
			{
				$mids = explode(',',$item['manager_ids']);
				if (in_array($_SESSION['mgrInternalKey'],$mids)) $nkid = $key;
			}
			
			if (!$item['roles']) $nkid = $key;
			if ($item['roles'])
			{
				$mids = explode(',',$item['roles']);
				if (in_array($_SESSION['roles'],$mids)) $nkid = $key;
			}
		}		
		if ($nkid) $modx->Event->output(serialize($mmenu[$nkid]['items']));
	}
}
if ($modx->Event->name=='OnManagerTopPrerender')
{
	$out = 'document.addEventListener(\'DOMContentLoaded\', function(){	
	$(\'#system ul\').prepend(\'<li><a href="./../configuringTopMenu" target="main"><i class="fa fa-cog"></i> Настройка верхнего меню</a></li>\')});
	</script>';	
	$modx->Event->output($out);
}																
?>
