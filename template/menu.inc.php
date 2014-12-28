<?php

# Меню в виде массивов. Добавляйте сколько угодно менюшек. Не забудьте вставить переменную в design.inc.php
# Добавлять следует в таком виде: адрес страницы, анкор ссылки (текстовая часть ссылки) и заголовок (всплывающая подсказка)
# И следите за запятой в конце элемента массива. Каждый элемент должен заканчиваться запятой, в отличие от последнего

$footmenu = array (
			array ('index', 'О компании', ''),
			array ('services', 'Услуги', ''),
			array ('partners', 'Партнеры', ''),
			array ('price', 'Цены', ''),
			array ('gallery', 'Галерея работ', ''),
			array ('stati', 'Статьи', ''),
			array ('contacts', 'Контакты', '')
);

$mainmenu = array (
			array ('index', 'О компании', ''),
			array ('services', 'Услуги', ''),
			array ('partners', 'Партнеры', ''),
			array ('price', 'Цены', ''),
			array ('gallery', 'Галерея работ', ''),
			array ('stati', 'Статьи', ''),
			array ('contacts', 'Контакты', '')
);

$ruspage = array ( 'obshhestroitelnye_raboty' => 'Общестроительные работы',
                   'stroitelstvo_zdanij_i_sooruzhenij' => 'Строительство зданий и сооружений',
			       'services' => 'Услуги',
			       'partners' => 'Партнеры',
			       'price' => 'Цены',
			       'gallery' => 'Галерея работ',
			       'stati' => 'Статьи',
			       'contacts' => 'Контакты',
				   'monolitnye_raboty' => 'Монолитные работы',
				   'stroitelstvo_fundamentov' => 'Строительство фундаментов',
				   '404' => 'Ошибка 404'
);

