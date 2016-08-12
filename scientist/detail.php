<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Типы публикаций детально");
?>
<?
if(SITE_ID == s1) {
	$prop['SCI'] = "Сотрудник";
	$prop['FULL_NAME'] = "FULL_NAME";
	$prop["MAIN"] = "Главная";
	$prop["SCIENTIST"] = "Сотрудники";
	$prop["SURNAME"] = "SURNAME";
	$prop["NAME"] = "NAME";
	$prop["PATRONIM"] = "PATRONIM";
	$prop["DESCRIPTION"] = "DESCRIPTION";
	$prop['RANK_STRING'] = "Должность";
	$prop['TITLE'] = "TITLE";
	$prop['DEGREE_STRING'] = "Ученая степень";
	$prop['PUBL_STR'] = "Публикации";
} else {
	$prop['SCI'] = "Scientist";
	$prop["FULL_NAME"] = "FULL_NAME_EN";
	$prop["MAIN"] = "Main";
	$prop["SCIENTIST"] = "Scientist";
	$prop["SURNAME"] = "SURNAME_EN";
	$prop["NAME"] = "NAME_EN";
	$prop["PATRONIM"] = "PATRONIM_EN";
	$prop["DESCRIPTION"] = "DESCRIPTION_EN";
	$prop['RANK_STRING'] = "Rank";
	$prop['TITLE'] = "TITLE_EN";
	$prop['DEGREE_STRING'] = "Academic degree";
	$prop['PUBL_STR'] = "Publications";
}
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(5, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while($ob = $res->GetNextElement())
{
	$arProp = $ob->GetProperties();
	$detail = $arProp[$prop['FULL_NAME']]['VALUE'];
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		<?echo $prop['SCI'];?> </h1>
		<ol class="breadcrumb">
			<li><a href="<?echo SITE_DIR;?>"><?echo $prop['MAIN'];?></a></li>
			<li class="active"><a href="<?echo SITE_DIR;?>scientist/"><?echo $prop['SCIENTIST'];?></a></li>
			<li class="active"><?echo $detail;?></li>
		</ol>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"",
	Array(
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
		"FIELD_CODE" => array("",""),
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array($prop['FULL_NAME'], $prop["SURNAME"],$prop["NAME"],$prop["PATRONIM"],$prop["DESCRIPTION"],""),
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
	)
);?>
<?
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(5, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	$detail = $arFields['NAME'];
	$arFilterI = Array("IBLOCK_ID"=>7, "ID" => $arProp['RANK']['VALUE']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	while($obI = $resI->GetNextElement()) {
		$arPropI = $obI->GetProperties();
		$arFieldsI = $obI->GetFields();
		echo $prop['RANK_STRING'], ": <a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['TITLE']]['VALUE'], "</a><br>";
	}
	$arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arProp['DEGREE']['VALUE']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	while($obI = $resI->GetNextElement()) {
		$arPropI = $obI->GetProperties();
		$arFieldsI = $obI->GetFields();
		echo $prop['DEGREE_STRING'], ": <a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['TITLE']]['VALUE'], "</a><br>";
	}
}
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>12, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_EMPLOYEELINK" => getCurrentID(5, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	$arFilter1 = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_AUTHORS" => $arFields['ID']);
	$res1 = CIBlockElement::GetList(Array(), $arFilter1, false, Array("nPageSize"=>10), $arSelect);
	echo $prop['PUBL_STR'], ":<br>";
	while ($ob1 = $res1->GetNextElement())
	{
		$arProp1 = $ob1->GetProperties();
		$arFields1 = $ob1->GetFields();
		echo "<a href=", $arFields1['DETAIL_PAGE_URL'], ">", $arProp1[$prop['TITLE']]['VALUE'], "</a><br>";
	}
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>