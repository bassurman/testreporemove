<?php

# Функция обработки ошибки 
function error404($pageout = false, $encoding = 'utf-8')
{
	header('Cache-Control: no-cache, no-store');
	header('Content-Type: text/html; charset=' . $encoding);
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	if ($pageout)
		Header("Location: http://ecmonstroy.by/404.html");
	die;
} 

# Генерация меню. По умолчанию ссылка активной страницы выделяется классом "active"
function GetMenuItems($page, $menu_items, $category = null)
{
	global $config;
	$menu = '';
	$category = ($category != null) ? $category . '/' : '';

	foreach ($menu_items as $i => $item)
	{
		if ($category . $page == $item[0])
			$menu .= '<li class="active"><a href="' . $config['sitelink'] . $item[0] . '.html"><span><i class="' . $item[2] . '"></i> ' . $item[1] . '</span></a></li>';
		else
			$menu .= '<li><a href="' . $config['sitelink'] . $item[0] . '.html"><span><i class="' . $item[2] . '"></i> ' . $item[1] . '</span></a></li>';
	}

	return $menu;
}

############################
function view_cat($sidemenu){
   while($row = mysql_fetch_assoc($sidemenu))
     {
       $data[$row['id']] = $row;
     }
	 function mapTree($dataset) { 
        $tree = array();
        foreach ($dataset as $id=>&$node) {
                     if (!$node['parent_id']) {
                            $tree[$id] = &$node;
                     }else {
                     $dataset[$node['parent_id']]['childs'][$id] = &$node;
                     }
        }
    return $tree;
 
    }
     // вызываем функцию и передаем ей наш массив
    $data = mapTree($data);
	
function view ($dataset) {
	global $page;
    global $config;
	      $menu = '';
          foreach ($dataset as $item) {
		     if($item['link']==$page)
			 $menu .= '<li class="active"><a href="'. $config['sitelink'] . $item['link'] . '.html">' . $item['name'] . '</a>';
             else
			 $menu .= '<li><a href="' . $config['sitelink'] . $item['link'] . '.html">' . $item['name'] . '</a>';
             if(isset($item['childs']) && is_array($item['childs'])) {
                 $menu .= '<ul class="submenu">';
                 foreach ($item['childs'] as $submenu_item)
			     {
				     if($submenu_item['link']==$page)
			         $menu .= '<li class="active"><a href="'. $config['sitelink'] .$item['link'].'/'. $submenu_item['link'] . '.html">' . $submenu_item['name'] . '</a>';
                     else
			         $menu .= '<li><a href="' . $config['sitelink'] .$item['link'].'/'. $submenu_item['link'] . '.html">' . $submenu_item['name'] . '</a>';
					 if(isset($submenu_item['childs']) && is_array($submenu_item['childs'])) {
					     $menu .= '<ul class="subsubmenu">';
					     foreach ($submenu_item['childs'] as $subsubmenu_item)
			             {
				          if($subsubmenu_item['link']==$page)
			              $menu .= '<li class="active"><a href="'. $config['sitelink'] .$item['link'].'/'.$submenu_item['link'].'/'. $subsubmenu_item['link'] . '.html">' . $subsubmenu_item['name'] . '</a>';
                          else
			              $menu .= '<li><a href="' . $config['sitelink'] .$item['link'].'/'.$submenu_item['link'].'/'. $subsubmenu_item['link'] . '.html">' . $subsubmenu_item['name'] . '</a>';
						  }
					  $menu .= '</ul>';
					 }
					 $menu .= '</li>';
				 }	
                 $menu .= '</ul>';
             }
             $menu .= '</li>';
 
         }
		 return $menu;
    }
	echo view($data);
}

# Навигация
function navigation($page, $category, $parent, $ruspage)
{
   $nav = '';
   if($page == 'index'){
   $nav = "<p>Вы находитесь на главной странице</p>";
   return $nav;
   }else{
   global $config;
   $sPage = $ruspage[$page];
   if ($category != null){
      if ($parent != null){
      $sCategory = '<i class="iconfa-caret-right"></i> <a href="' . $config['sitelink']. $parent . '/' . $category . '.html">' . $ruspage[$category] . '</a>';
	  $sParent = '<i class="iconfa-caret-right"></i> <a href="' . $config['sitelink'] . $parent . '.html">' . $ruspage[$parent] . '</a> ';
      }else{
	  $sCategory = '<i class="iconfa-caret-right"></i> <a href="' . $config['sitelink']. $category . '.html">' . $ruspage[$category] . '</a>';
	  $sParent = '';
	  }
   }else{
   $sCategory = '';
   $sParent = '';
   }
   $nav = '<p><a href="'. $config['sitelink'] .'index.html"><i class="iconfa-home"></i></a> '.$sParent.$sCategory.' <i class="iconfa-caret-right"></i> '.$sPage;
   return $nav;
   }	
}

#Замена скобок
function replace($str)
{
   global $config;
   $order = array ('[',']','*sitelink*');
   $replace = array ('<','>',$config['sitelink']);
   $str = str_replace($order, $replace, $str);
   return $str; 
}

#Получение стилей
function getStyles($styles)
{
    global $config;
    if(preg_match('/\,/', $styles)){
	   $style = explode(',', $styles);
	   $count = count($styles);
	   $res = '';
	   for ($i = 0; $i <= $count; $i++) 
        { 
         $res .= "<link rel='stylesheet' type='text/css' href='".$config['sitelink']."css/".$style[$i].".css'>";        
		 } 
	   return $res;
	}else{
	 $res = "<link rel='stylesheet' type='text/css' href='".$config['sitelink']."css/".$styles.".css'>";
	 return $res;
	}
}

#Получение скриптов
function getjs($js)
{
    global $config;
    if(preg_match('/\,/', $js)){
	   $jss = explode(',', $js);
	   $count = count($jss);
	   $res = '';
	   for ($i = 0; $i <= $count; $i++) 
        { 
         $res .= "<link rel='stylesheet' type='text/css' href='".$config['sitelink']."css/".$jss[$i].".css'>";        
		 } 
	   return $res;
	}else{
	 $res = "<link rel='stylesheet' type='text/css' href='".$config['sitelink']."css/".$js.".css'>";
	 return $res;
	}
}

# Выборка шаблонов
function GetTemplates()
{
	$path = dirname(__FILE__) . '/../template/';
	$templates = array();

	# Парсим папку templates
	$handle = opendir($path);

	# Выбираем массив шаблонов
	if ($handle != false)
	{
		while (($file = readdir($handle)) !== false)
		{
			if ((strpos($file, '.')>0) && $file != '..' && $file != '.' && $file != 'menu.inc.php')
			{
				$i = strtok($file, '.');
				$templates[] = $i;
			}
		}

		closedir($handle);
	}
	
	# Сортируем массив
	if(!empty($templates))
		natsort($templates);
	else
		$templates =false;
	return $templates;
}