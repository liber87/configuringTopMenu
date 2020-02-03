<?php
	$mmenu_default = array('general' => array(	
	'title' => 'Общая конфигурация',
	'roles' => '',
	'manager_ids' =>'',
	'items' => array(
	'bars' => 
	array (
    0 => 'bars',
    1 => 'main',
    2 => '<i class="fa fa-bars"></i>',
    3 => 'javascript:;',
    4 => 'Главная',
    5 => 'modx.resizer.toggle(); return false;',
    6 => ' return false;',
    7 => '',
    8 => 0,
    9 => 10,
    10 => '',
	),
	'site' => 
	array (
    0 => 'site',
    1 => 'main',
    2 => '<i class="fa fa-tachometer"></i><span class="menu-item-text">Главная</span>',
    3 => 'index.php?a=2',
    4 => 'Главная',
    5 => '',
    6 => '',
    7 => 'main',
    8 => 0,
    9 => 10,
    10 => 'active',
	),
	'elements' => 
	array (
    0 => 'elements',
    1 => 'main',
    2 => '<i class="fa fa-th"></i><span class="menu-item-text">Элементы</span>',
    3 => 'javascript:;',
    4 => 'Элементы',
    5 => ' return false;',
    6 => '',
    7 => '',
    8 => 0,
    9 => 20,
    10 => '',
	),
	'modules' => 
	array (
    0 => 'modules',
    1 => 'main',
    2 => '<i class="fa fa-cubes"></i><span class="menu-item-text">Модули</span>',
    3 => 'javascript:;',
    4 => 'Модули',
    5 => ' return false;',
    6 => '',
    7 => '',
    8 => 0,
    9 => 30,
    10 => '',
	),
	'users' => 
	array (
    0 => 'users',
    1 => 'main',
    2 => '<i class="fa fa-users"></i><span class="menu-item-text">Пользователи</span>',
    3 => 'javascript:;',
    4 => 'Пользователи',
    5 => ' return false;',
    6 => 'edit_user',
    7 => '',
    8 => 0,
    9 => 40,
    10 => '',
	),
	'tools' => 
	array (
    0 => 'tools',
    1 => 'main',
    2 => '<i class="fa fa-wrench"></i><span class="menu-item-text">Инструменты</span>',
    3 => 'javascript:;',
    4 => 'Инструменты',
    5 => ' return false;',
    6 => '',
    7 => '',
    8 => 0,
    9 => 50,
    10 => '',
	),
	'element_templates' => 
	array (
    0 => 'element_templates',
    1 => 'elements',
    2 => '<i class="fa fa-newspaper-o"></i>Шаблоны<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=76&amp;tab=0',
    4 => 'Шаблоны',
    5 => '',
    6 => 'new_template,edit_template',
    7 => 'main',
    8 => 0,
    9 => 10,
    10 => 'dropdown-toggle',
	),
	'element_tplvars' => 
	array (
    0 => 'element_tplvars',
    1 => 'elements',
    2 => '<i class="fa fa-list-alt"></i>Параметры (TV)<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=76&amp;tab=1',
    4 => 'Параметры (TV)',
    5 => '',
    6 => 'new_template,edit_template',
    7 => 'main',
    8 => 0,
    9 => 20,
    10 => 'dropdown-toggle',
	),
	'element_htmlsnippets' => 
	array (
    0 => 'element_htmlsnippets',
    1 => 'elements',
    2 => '<i class="fa fa-th-large"></i>Чанки<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=76&amp;tab=2',
    4 => 'Чанки',
    5 => '',
    6 => 'new_chunk,edit_chunk',
    7 => 'main',
    8 => 0,
    9 => 30,
    10 => 'dropdown-toggle',
	),
	'element_snippets' => 
	array (
    0 => 'element_snippets',
    1 => 'elements',
    2 => '<i class="fa fa-code"></i>Сниппеты<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=76&amp;tab=3',
    4 => 'Сниппеты',
    5 => '',
    6 => 'new_snippet,edit_snippet',
    7 => 'main',
    8 => 0,
    9 => 40,
    10 => 'dropdown-toggle',
	),
	'element_plugins' => 
	array (
    0 => 'element_plugins',
    1 => 'elements',
    2 => '<i class="fa fa-plug"></i>Плагины<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=76&amp;tab=4',
    4 => 'Плагины',
    5 => '',
    6 => 'new_plugin,edit_plugin',
    7 => 'main',
    8 => 0,
    9 => 50,
    10 => 'dropdown-toggle',
	),
	'manage_files' => 
	array (
    0 => 'manage_files',
    1 => 'elements',
    2 => '<i class="fa fa-folder-open-o"></i>Управление файлами',
    3 => 'index.php?a=31',
    4 => 'Управление файлами',
    5 => '',
    6 => 'file_manager',
    7 => 'main',
    8 => 0,
    9 => 80,
    10 => '',
	),
	'manage_categories' => 
	array (
    0 => 'manage_categories',
    1 => 'elements',
    2 => '<i class="fa fa-object-group"></i>Управления категориями',
    3 => 'index.php?a=120',
    4 => 'Управления категориями',
    5 => '',
    6 => 'category_manager',
    7 => 'main',
    8 => 0,
    9 => 70,
    10 => '',
	),
	'new_module' => 
	array (
    0 => 'new_module',
    1 => 'modules',
    2 => '<i class="fa fa-cubes"></i>Управление модулями',
    3 => 'index.php?a=106',
    4 => 'Управление модулями',
    5 => '',
    6 => 'new_module,edit_module',
    7 => 'main',
    8 => 1,
    9 => 0,
    10 => '',
	),
	
	'module1' => 
	array (
    0 => 'module1',
    1 => 'modules',
    2 => '<i class="fa fa-cube"></i>Extras',
    3 => 'index.php?a=112&amp;id=1',
    4 => 'Extras',
    5 => '',
    6 => '',
    7 => 'main',
    8 => 0,
    9 => 1,
    10 => '',
	),	
	'user_management_title' => 
	array (
    0 => 'user_management_title',
    1 => 'users',
    2 => '<i class="fa fa-user-circle-o"></i>Управление менеджерами<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=75',
    4 => 'Управление менеджерами',
    5 => '',
    6 => 'edit_user',
    7 => 'main',
    8 => 0,
    9 => 10,
    10 => 'dropdown-toggle',
	),
	'web_user_management_title' => 
	array (
    0 => 'web_user_management_title',
    1 => 'users',
    2 => '<i class="fa fa-user"></i>Управление веб-пользователями<i class="fa fa-angle-right toggle"></i>',
    3 => 'index.php?a=99',
    4 => 'Управление веб-пользователями',
    5 => '',
    6 => 'edit_web_user',
    7 => 'main',
    8 => 0,
    9 => 20,
    10 => 'dropdown-toggle',
	),
	'role_management_title' => 
	array (
    0 => 'role_management_title',
    1 => 'users',
    2 => '<i class="fa fa-legal"></i>Управление ролями',
    3 => 'index.php?a=86',
    4 => 'Управление ролями',
    5 => '',
    6 => 'new_role,edit_role,delete_role',
    7 => 'main',
    8 => 0,
    9 => 30,
    10 => '',
	),
	'manager_permissions' => 
	array (
    0 => 'manager_permissions',
    1 => 'users',
    2 => '<i class="fa fa-male"></i>Права менеджеров',
    3 => 'index.php?a=40',
    4 => 'Права менеджеров',
    5 => '',
    6 => 'access_permissions',
    7 => 'main',
    8 => 0,
    9 => 40,
    10 => '',
	),
	'web_permissions' => 
	array (
    0 => 'web_permissions',
    1 => 'users',
    2 => '<i class="fa fa-universal-access"></i>Права веб-пользователей',
    3 => 'index.php?a=91',
    4 => 'Права веб-пользователей',
    5 => '',
    6 => 'web_access_permissions',
    7 => 'main',
    8 => 0,
    9 => 50,
    10 => '',
	),
	'refresh_site' => 
	array (
    0 => 'refresh_site',
    1 => 'tools',
    2 => '<i class="fa fa-recycle"></i>Очистить кэш',
    3 => 'index.php?a=26',
    4 => 'Очистить кэш',
    5 => '',
    6 => '',
    7 => 'main',
    8 => 0,
    9 => 5,
    10 => 'item-group',
    11 => 
    array (
	'refresh_site_in_window' => 
	array (
	0 => 'a',
	1 => 'javascript:;',
	2 => 'btn btn-secondary',
	3 => 'modx.popup({url:\'index.php?a=26\', title:\'Очистить кэш\', icon: \'fa-recycle\', iframe: \'ajax\', selector: \'.tab-page&gt;.container\', position: \'right top\', width: \'auto\', maxheight: \'50%\', wrap: \'body\' })',
	4 => 'Очистить кэш',
	5 => '<i class="fa fa-recycle"></i>',
	),
    ),
	),
	'search' => 
	array (
    0 => 'search',
    1 => 'tools',
    2 => '<i class="fa fa-search"></i>Поиск',
    3 => 'index.php?a=71',
    4 => 'Поиск',
    5 => '',
    6 => '',
    7 => 'main',
    8 => 1,
    9 => 9,
    10 => '',
	),
	'bk_manager' => 
	array (
    0 => 'bk_manager',
    1 => 'tools',
    2 => '<i class="fa fa-database"></i>Резервное копирование',
    3 => 'index.php?a=93',
    4 => 'Резервное копирование',
    5 => '',
    6 => 'bk_manager',
    7 => 'main',
    8 => 0,
    9 => 10,
    10 => '',
	),
	'remove_locks' => 
	array (
    0 => 'remove_locks',
    1 => 'tools',
    2 => '<i class="fa fa-hourglass"></i>Удалить блокировки',
    3 => 'javascript:modx.removeLocks();',
    4 => 'Удалить блокировки',
    5 => '',
    6 => 'remove_locks',
    7 => '',
    8 => 0,
    9 => 20,
    10 => '',
	),
	'import_site' => 
	array (
    0 => 'import_site',
    1 => 'tools',
    2 => '<i class="fa fa-upload"></i>Импортировать сайт',
    3 => 'index.php?a=95',
    4 => 'Импортировать сайт',
    5 => '',
    6 => 'import_static',
    7 => 'main',
    8 => 0,
    9 => 30,
    10 => '',
	),
	'export_site' => 
	array (
    0 => 'export_site',
    1 => 'tools',
    2 => '<i class="fa fa-download"></i>Экспортировать сайт',
    3 => 'index.php?a=83',
    4 => 'Экспортировать сайт',
    5 => '',
    6 => 'export_static',
    7 => 'main',
    8 => 1,
    9 => 40,
    10 => '',
	)
	)
	)
);