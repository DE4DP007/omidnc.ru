<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/en/authors/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/authors/detail.php",
	),
	array(
		"CONDITION" => "#^/position/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/position/detail.php",
	),
	array(
		"CONDITION" => "#^/en/position/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/position/detail.php",
	),
	array(
		"CONDITION" => "#^/en/position/#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/position/index.php",
	),
	array(
		"CONDITION" => "#^/en/publtype/index.php?.*#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/publtype/index.php",
	),
	array(
		"CONDITION" => "#^/publtype/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/publtype/detail.php",
	),
	array(
		"CONDITION" => "#^/en/publtype/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/publtype/detail.php",
	),
	array(
		"CONDITION" => "#^/en/publtype/#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/publtype/index.php",
	),
	array(
		"CONDITION" => "#^/en/journals/index.php?.*#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/journals/index.php",
	),
	array(
		"CONDITION" => "#^/journals/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/journals/detail.php",
	),

	array(
		"CONDITION" => "#^/en/journals/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/journals/detail.php",
	),
	array(
		"CONDITION" => "#^/en/journals/#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/journals/index.php",
	),
	array(
		"CONDITION" => "#^/authors/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/authors/detail.php",
	),
	array(
		"CONDITION" => "#^/degree/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/degree/detail.php",
	),
	array(
		"CONDITION" => "#^/en/degree/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/degree/detail.php",
	),
	array(
		"CONDITION" => "#^/en/degree/#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/degree/index.php",
	),
	array(
		"CONDITION" => "#^/en/publications/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/publications/detail.php",
	),
	array(
		"CONDITION" => "#^/publications/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/publications/detail.php",
	),
	array(
		"CONDITION" => "#^/publications/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/publications/index.php",
	),
	array(
		"CONDITION" => "#^/en/publications/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/publications/index.php",
	),
	array(
		"CONDITION" => "#^/en/authors/#",
		"ID" => "bitrix:news.list",
		"PATH" => "/authors/index.php",
	),
	array(
		"CONDITION" => "#^/products/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/products/index.php",
	),
	array(
		"CONDITION" => "#^/scientist/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/scientist/detail.php",
	),
	array(
		"CONDITION" => "#^/en/scientist/([a-zA-Z0-9\\.\\-_]+)/?.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "bitrix:news.detail",
		"PATH" => "/scientist/detail.php",
	),
	array(
		"CONDITION" => "#^/scientist/#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/scientist/index.php",
	),
	array(
		"CONDITION" => "#^/en/scientist/#",
		"RULE" => "",
		"ID" => "bitrix:news.list",
		"PATH" => "/scientist/index.php",
	),
	array(
		"CONDITION" => "#^/services/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/services/index.php",
	),
	array(
		"CONDITION" => "#^/en/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/en/news/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
);

?>