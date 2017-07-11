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
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	".default",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "biblio",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => $prop[1],
			1 => $prop[0],
			2 => $prop[2],
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N"
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