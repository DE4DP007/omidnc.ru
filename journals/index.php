<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Журналы");
?><!-- <?
if(SITE_ID == s1) {
	$prop['HEAD'] = "Список";
	$prop['HEAD_SMALL'] = "изданий";
	$prop['MAIN'] = "Главная";
	$prop['JOURNALS'] = "Издания";
	$prop['TITLE'] = "TITLE";
	$prop['DESCRIPTION'] = "DESCRIPTION";
	$prop['PUBL_STR'] = "Статьи";
} else {
	$prop['HEAD'] = "List";
	$prop['HEAD_SMALL'] = "of journals";
	$prop['MAIN'] = "Main";
	$prop['JOURNALS'] = "Journals";
	$prop['TITLE'] = "TITLE_EN";
	$prop['DESCRIPTION'] = "DESCRIPTION_EN";
	$prop['PUBL_STR'] = "Publications";
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		<?echo $prop['HEAD'];?> <small><?echo $prop['HEAD_SMALL'];?></small> </h1>
		<ol class="breadcrumb">
			<li><?echo SITE_DIR;?></li>
			<li class="active"><?echo $prop['JOURNALS'];?></li>
		</ol>
	</div>
</div>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>11);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<p><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a></b><br>";
	if(CFile::GetPath($arFields['PREVIEW_PICTURE']) != null) {
		echo "<img src=", CFile::GetPath($arFields['PREVIEW_PICTURE']), "><br>";
	}
	if($arProp[$prop["DESCRIPTION"]]["VALUE"] != null){
		echo $arProp[$prop['DESCRIPTION']]['NAME'], ": ", $arProp[$prop['DESCRIPTION']]['VALUE'], "<br>";
	}
	if(getSize(9, "PROPERTY_JOURNAL", $arFields['ID']) != 0) {
		$arFilter1 = Array("IBLOCK_ID"=>9, "PROPERTY_JOURNAL"=>$arFields['ID']);
		$res1 = CIBlockElement::GetList(Array(), $arFilter1, false, Array("nPageSize"=>10), $arSelect);
		echo $prop['PUBL_STR'], ":<br>";
		while ($ob1 = $res1->GetNextElement()) {
			$arFields1 = $ob1->GetFields();
			$arProp1 = $ob1->GetProperties();
			echo "<a href='", $arFields1["DETAIL_PAGE_URL"], "'>", $arProp1[$prop['TITLE']]['VALUE'], "<br>";
		}
	}
	echo "</p>";
}
?> -->
<?
function getSize($block, $property, $id)
{
	return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<!-- <?
$arFilter = array('IBLOCK_ID' => 11);
$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID'));
if ($el = $res->Fetch())
	echo 'Количество изданий: '.$el['CNT'];?> -->
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"omi_journal", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "omi_journal",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "TITLE",
			1 => "DESCRIPTION",
			2 => "LINK",
			3 => "IF_RINC",
			4 => "IF_SCOPUS",
			5 => "IF_WOS",
			6 => "COUNTRY",
			7 => "VAK",
			8 => "ADDRESS",
			9 => "PHONE",
			10 => "FAX",
			11 => "EMAIL",
			12 => "ISSN",
			13 => "ISBN",
			14 => "PUBLISHER",
			15 => "ZBMATH_LINK",
			16 => "RINC_LINK",
			17 => "WOS_LINK",
			18 => "SCOPUS_LINK",
			19 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "biblio",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "TITLE",
			1 => "DESCRIPTION",
			2 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/journals/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>