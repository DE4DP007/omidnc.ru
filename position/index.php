<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Должность");
?>
<!-- <div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		<?echo $prop['POSITIONS'];?> <small><?echo $prop['HEAD_SMALL'];?></small> </h1>
		<ol class="breadcrumb">
			<li><?echo SITE_DIR;?></li>
			<li class="active"><?echo $prop['POSITIONS'];?></li>
		</ol>
	</div>
</div> -->
<!-- <?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>7);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
echo "<div class=\"container-fluid\">";
$i = 0;
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<p class=\"col-md-4 col-sm-6\"><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a></b><br>";
	if($arProp[$prop['SHORT_TITLE']]['VALUE'])
		echo $arProp[$prop['SHORT_TITLE']]['NAME'], ": ", $arProp[$prop['SHORT_TITLE']]['VALUE'], "<br>";
	$arFilterI = Array("IBLOCK_ID"=>5, "PROPERTY_RANK" => $arFields['ID']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	if(getSize(5, "PROPERTY_RANK", $arFields['ID']) != 0)
	{
		echo $prop['SCI_LIST'], ":<br>";
		while($obI = $resI->GetNextElement()) {
			$arPropI = $obI->GetProperties();
			$arFieldsI = $obI->GetFields();
			echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['FULL_NAME']]['VALUE'], "</a><br>";
		}
	}
	echo "</p>";
	$i++;
	if ($i%3 == 0)
	{
		echo "<div class=\"clearfix\"></div>";
	}
}
echo "</div>";
?> -->
<?
function getSize($block, $property, $id)
{
	return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"omi_pos", 
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
		"COMPONENT_TEMPLATE" => "omi_pos",
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
			1 => "SHORT_TITLE",
			2 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "DEGREE",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "TITLE",
			1 => "TITLE_EN",
			2 => "SHORT_TITLE",
			3 => "SHORT_TITLE_EN",
			4 => "",
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
		"SEF_FOLDER" => "/position/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
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