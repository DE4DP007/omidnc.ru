<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Должность детально");
?>
<?
if(SITE_ID == s1){
	title("Автор", "Авторы", "Главная", "FULL_NAME");
	$prop[0] = "NAME";
	$prop[1] = "SURNAME";
	$prop[2] = "PATRONIM";
} else {
	title("Author", "Authors", "Main", "FULL_NAME_EN");
	$prop[0] = "ENNAME";
	$prop[1] = "ENSURNAME";
	$prop[2] = "ENPATRONIM";
}
?>
 <?$APPLICATION->IncludeComponent("bitrix:news.detail", "AuthorName", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],	// Код новости
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],	// ID новости
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "12",	// Код информационного блока
		"IBLOCK_TYPE" => "biblio",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Страница",	// Название категорий
		"PROPERTY_CODE" => array(	// Свойства
			0 => $prop[1],
			1 => $prop[0],
			2 => $prop[2],
		),
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"USE_SHARE" => "N",	// Отображать панель соц. закладок
	),
	false
);?>
<?
if(SITE_ID == s1) {
	getPublication("Список публикаций", "Публикации", "TITLE");
} else {
	getPublication("Publication list", "Publications", "TITLE_EN");
}
?>
<?
function getPublication($publStr, $navStr, $titleStr) {
	echo "<br>
	<h4>", $publStr, "</h4>";
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_AUTHORS" => getCurrentID(12, $_REQUEST["ELEMENT_CODE"]));
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
	$res->NavStart(10);
	echo $res->NavPrint($navStr), "<br>";
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProp = $ob->GetProperties();
		echo "<a href='",$arFields['DETAIL_PAGE_URL'], "'>", $arProp[$titleStr]['VALUE'], "</a>";
		echo "<br>";
	}
	echo $res->NavPrint($navStr);
}
?>
<?
function getCurrentID($iblock_id, $code)
{
	if(CModule::IncludeModule("iblock"))
	{
		$arFilter = array("IBLOCK_ID"=>$iblock_id, "CODE" => $code);
		$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>1), array('ID'));
		$element = $res->Fetch();
		if($res->SelectedRowsCount() != 1) return '<p>Элемент не найден</p>';
		else return $element['ID'];
	}
}
?>
<?
function title($author, $authors, $main, $full_text) {
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>12, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(12, $_REQUEST["ELEMENT_CODE"]));
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arProp = $ob->GetProperties();
		$detail = $arProp[$full_text]['VALUE'];
	}
	echo "<div class=\"row\">
		<div class=\"col-lg-12\">
			<h1 class=\"page-header\">",
				$author,
			"</h1>
			<ol class=\"breadcrumb\">
				<li><a href=", SITE_DIR, ">", $main, "</a></li>
				<li class=\"active\"><a href=", SITE_DIR, "authors/", ">", $authors, "</a></li>
				<li class=\"active\">", $detail, "</li>
			</ol>

		</div>
	</div>";
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>