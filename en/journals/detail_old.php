<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
if(SITE_ID == s1) {
	$prop['HEAD'] = "Издание";
	$prop['MAIN'] = "Главная";
	$prop['JOURNALS'] = "Издания";
	$prop['TITLE'] = "TITLE";
	$prop['DESCRIPTION'] = "DESCRIPTION";
	$prop['ADDRESS'] = "ADDRESS";
	$prop['PUBLISHER'] = "PUBLISHER";
	$prop['COUNTRY'] = "COUNTRY";
	$prop['PUBLICATIONS'] = "Список публикаций";
	$prop['LINK_STR'] = "Ссылка на сайт";
	$prop['VAK_STR'] = "ВАК";
	$prop['IF_SCOPUS_STR'] = "ИФ Scopus";
	$prop['IF_WOS_STR'] = "ИФ WoS";
	$prop['IF_RINC_STR'] = "ИФ РИНЦ";
	$prop['SCOPUS_LINK_STR'] = "Ссылка на Scopus";
	$prop['WOS_LINK_STR'] = "Ссылка на WoS";
	$prop['ZBMAX_LINK_STR'] = "Ссылка на zbMATH";
	$prop['RINC_LINK_STR'] = "Ссылка на РИНЦ";
	$prop['PHONE_STR'] = "Телефон";
	$prop['FAX_STR'] = "Факс";
} else {
	$prop['HEAD'] = "Journal";
	$prop['MAIN'] = "Main";
	$prop['JOURNALS'] = "Journals";
	$prop['TITLE'] = "TITLE_EN";
	$prop['DESCRIPTION'] = "DESCRIPTION_EN";
	$prop['ADDRESS'] = "ADDRESS_EN";
	$prop['PUBLISHER'] = "PUBLISHER_EN";
	$prop['COUNTRY'] = "COUNTRY_EN";
	$prop['PUBLICATIONS'] = "Publications";
	$prop['LINK_STR'] = "Link";
	$prop['VAK_STR'] = "VAK";
	$prop['IF_SCOPUS_STR'] = "IF Scopus";
	$prop['IF_WOS_STR'] = "IF WoS";
	$prop['IF_RINC_STR'] = "IF RINC";
	$prop['SCOPUS_LINK_STR'] = "Scopus URL";
	$prop['WOS_LINK_STR'] = "WoS URL";
	$prop['ZBMAX_LINK_STR'] = "zbMATH URL";
	$prop['RINC_LINK_STR'] = "RINC URL";
	$prop['PHONE_STR'] = "Phone number";
	$prop['FAX_STR'] = "FAX";
}
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(11, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while($ob = $res->GetNextElement())
{
	$arProp = $ob->GetProperties();
	$detail = $arProp[$prop['TITLE']]['VALUE'];
}
$APPLICATION->SetTitle($detail);
?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<?echo $prop['HEAD'];?>
			</h1>
			<ol class="breadcrumb">
				<li><a href=<?echo SITE_DIR;?>><?echo $prop['MAIN'];?></a></li>
				<li class="active"><a href="<?echo SITE_DIR;?>journals/"><?echo $prop['JOURNALS'];?></a></li>
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
		"IBLOCK_ID" => "11",
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
			0 => $prop['TITLE'],
			2 => $prop['DESCRIPTION'],
			3 => "EMAIL",
			6 => "ISBN",
			7 => "ISSN",
			8 => $prop['ADDRESS'],
			10 => $prop["PUBLISHER"],
			18 => $prop['COUNTRY'],
			21 => "",
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
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(11, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	if($arProp['LINK']['VALUE'] != null)
	{
		echo $prop['LINK_STR'], ": <a href=", $arProp['LINK']['VALUE'], ">", $arProp['LINK']['VALUE'], "</a><br>";
	}
	if($arProp['VAK']['VALUE'] != null)
	{
		echo $prop['VAK_STR'], ": ", $arProp['VAK']['VALUE'], "<br>";
	}
	if($arProp['IF_SCOPUS']['VALUE'] != null)
	{
		echo $prop['IF_SCOPUS_STR'], ": ", $arProp['IF_SCOPUS']['VALUE'], "<br>";
	}
	if($arProp['IF_WOS']['VALUE'] != null)
	{
		echo $prop['IF_WOS_STR'], ": ", $arProp['IF_WOS']['VALUE'], "<br>";
	}
	if($arProp['IF_RINC']['VALUE'] != null)
	{
		echo $prop['IF_RINC_STR'], ": ", $arProp['IF_RINC']['VALUE'], "<br>";
	}
	if($arProp['SCOPUS_LINK']['VALUE'] != null)
	{
		echo $prop['SCOPUS_LINK_STR'], ": <a href=", $arProp['SCOPUS_LINK']['VALUE'], ">", $arProp['SCOPUS_LINK']['VALUE'], "</a><br>";
	}
	if($arProp['WOS_LINK']['VALUE'] != null)
	{
		echo $prop['WOS_LINK_STR'], ": <a href=", $arProp['WOS_LINK']['VALUE'], ">", $arProp['WOS_LINK']['VALUE'], "</a><br>";
	}
	if($arProp['ZBMATH_LINK']['VALUE'] != null)
	{
		echo $prop['ZBMATH_LINK_STR'], ": <a href=", $arProp['ZBMATH_LINK']['VALUE'], ">", $arProp['ZBMATH_LINK']['VALUE'], "</a><br>";
	}
	if($arProp['RINC_LINK']['VALUE'] != null)
	{
		echo $prop['RINC_LINK_STR'], ": <a href=", $arProp['RINC_LINK']['VALUE'], ">", $arProp['RINC_LINK']['VALUE'], "</a><br>";
	}
	if($arProp['PHONE']['VALUE'] != null)
	{
		echo $prop['PHONE_STR'], ": ", $arProp['PHONE']['VALUE'], "<br>";
	}
	if($arProp['FAX']['VALUE'] != null)
	{
		echo $prop['FAX_STR'], ": ", $arProp['FAX']['VALUE'], "<br>";
	}
}
?>
<br>
<h4><?echo $prop['PUBLICATIONS'];?></h4>
<?
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_JOURNAL" => getCurrentID(11, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
$res->NavStart(10);
while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<a href='",$arFields['DETAIL_PAGE_URL'], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a>";
	echo "<br>";
}
echo $res->NavPrint("Журналы");
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