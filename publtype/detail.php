<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Типы публикаций детально");
?>
<?
if(SITE_ID == s1) {
	$prop['TITLE'] = "TITLE";
	$prop['HEAD'] = "Тип";
	$prop['HEAD_SMALL'] = "публикации";
	$prop['PUB_LIST'] = "Список публикаций";
	$prop['MAIN'] = "Главная";
	$prop['TYPE'] = "Типы публикаций";
} else {
	$prop['TITLE'] = "TITLE_EN";
	$prop['HEAD'] = "Type";
	$prop['HEAD_SMALL'] = "of publication";
	$prop['PUB_LIST'] = "Publication list";
	$prop['MAIN'] = "Main";
	$prop['TYPE'] = "Type of publications";
}
?>
<?
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(10, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while($ob = $res->GetNextElement())
{
	$arProp = $ob->GetProperties();
	$detail = $arProp[$prop['TITLE']]['VALUE'];
}
?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<?echo $prop['HEAD'];?>
				<small><?echo $prop['HEAD_SMALL']?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href=<?echo SITE_DIR;?>><?echo $prop['MAIN']?></a></li>
				<li class="active"><a href="<?echo SITE_DIR;?>publtype/"><?echo $prop['TYPE']?></a></li>
				<li class="active"><?echo $detail;?></li>
			</ol>

		</div>
	</div>
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
		"IBLOCK_ID" => "10",
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
			0 => $prop["TITLE"],
			1 => "",
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
if (getSize(9, "PROPERTY_PUBLTYPE", getCurrentID(10, $_REQUEST["ELEMENT_CODE"])) != 0) {
	echo "<h4>", $prop['PUB_LIST'], "</h4>";
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PUBLTYPE" => getCurrentID(10, $_REQUEST["ELEMENT_CODE"]));
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
	$res->NavStart(10);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProp = $ob->GetProperties();
		echo "<a href='",$arFields['DETAIL_PAGE_URL'], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a>";
		echo "<br>";
	}
	echo $res->NavPrint($prop['PUB_LIST']);
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
function getSize($block, $property, $id)
{
	return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>