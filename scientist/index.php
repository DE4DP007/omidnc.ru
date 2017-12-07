<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудники");
?><?
if(SITE_ID == s1) {
	title("Сотрудники", "Главная");
	$prop['FULL_NAME'] = "FULL_NAME";
	$prop['SURNAME'] = "SURNAME";
	$prop['NAME'] = "NAME";
	$prop['PATRONIM'] = "PATRONIM";
	$prop['DESCRIPTION'] = "DESCRIPTION";
	$prop['RANK_STRING'] = "Должность";
	$prop['RANK'] = "TITLE";
	$prop['DEGREE_STRING'] = "Ученая степень";
	$prop['DEGREE'] = "TITLE";
	$prop['MORE'] = "Подробнее";
} else {
	title("Scientists", "Main");
	$prop['FULL_NAME'] = "FULL_NAME_EN";
	$prop['SURNAME'] = "SURNAME_EN";
	$prop['NAME'] = "NAME_EN";
	$prop['PATRONIM'] = "PATRONIM_EN";
	$prop['DESCRIPTION'] = "DESCRIPTION_EN";
	$prop['RANK_STRING'] = "Rank";
	$prop['RANK'] = "TITLE_EN";
	$prop['DEGREE_STRING'] = "Academic degree";
	$prop['DEGREE'] = "TITLE_EN";
	$prop['MORE'] = "More";
}
?>
<!-- <?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>5);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array("nPageSize"=>10), $arSelect);
$i=0;
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<div class=\"test col-md-6 col-sm-12\">";
	echo "<div class=\"thumbnail container-fluid\">";
	echo "<img class=\"thumbnail\" src=", CFile::GetPath($arFields['PREVIEW_PICTURE']), ">";
	echo "<div class=\"scientist-det-group col-md-12\"><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['FULL_NAME']]['VALUE'], "</a></b><br>";
	$arFilterI = Array("IBLOCK_ID"=>7, "ID" => $arProp['RANK']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	while($obI = $resI->GetNextElement()) {
		$arPropI = $obI->GetProperties();
		$arFieldsI = $obI->GetFields();
		echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['RANK']]['VALUE'], "</a><br>";
	}
	$arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arProp['DEGREE']['VALUE']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	while($obI = $resI->GetNextElement()) {
		$arPropI = $obI->GetProperties();
		$arFieldsI = $obI->GetFields();
		echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['DEGREE']]['VALUE'], "</a><br>";
	}
	//echo $arProp[$prop['SURNAME']]['NAME'], ": ", $arProp[$prop['SURNAME']]['VALUE'], "<br>";
	//echo $arProp[$prop['NAME']]['NAME'], ": ", $arProp[$prop['NAME']]['VALUE'], "<br>";
	//echo $arProp[$prop['PATRONIM']]['NAME'], ": ", $arProp[$prop['PATRONIM']]['VALUE'], "<br>";
	//echo $arProp[$prop['DESCRIPTION']]['NAME'], ": ", $arProp[$prop['DESCRIPTION']]['VALUE'], "<br>";

	echo "</div>";
    echo "<div class=\"col-md-12 text-justify\">";
    echo mb_strimwidth($arProp[$prop['DESCRIPTION']]['VALUE'],0,500, "...");
    echo "<div class='caption'><ul class=\"list-inline text-center\">
                    <li><a href=\"#\"><i class=\"fa fa-2x fa-facebook-square\"></i></a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-2x fa-linkedin-square\"></i></a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-2x fa-twitter-square\"></i></a>
                    </li>
                </ul></div>";
    echo "<a href=\"",$arFields["DETAIL_PAGE_URL"],"\" class=\"btn btn-primary sci-details\"><span class=\"glyphicon glyphicon-share-alt\"></span>", $prop['MORE'], "</a>";
    echo "</div>";
	echo "</div>";
	echo "</div>";
	if ($i%2==1){
	echo "<div class='clearfix'></div>";
	}
	$i++;
}
echo "<div class='clearfix'></div>";
?>
<?
function getSize($block, $property, $id)
{
	return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<?
function title($authors, $main) {
	echo "	<div class=\"row\">
		<div class=\"col-lg-12\">
			<h1 class=\"page-header\">",
	$authors,
	"</h1>
			<ol class=\"breadcrumb\">
				<li><a href=",SITE_DIR, ">", $main, "</a></li>
				<li class=\"active\">", $authors, "</li>
			</ol>
		</div>
	</div>";
}
?> -->
<!-- <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"scientist_list",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "scientist_list",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"FULL_NAME",1=>"FULL_NAME_EN",2=>"EMAIL",3=>"SURNAME",4=>"NAME",5=>"PATRONIM",6=>"DESCRIPTION",7=>"SURNAME_EN",8=>"NAME_EN",9=>"PATRONIM_EN",10=>"DESCRIPTION_EN",11=>"DATE_OF_BIRTH",12=>"VAK_SPEC_EN",13=>"VAK_SPEC",14=>"KEYWORDS",15=>"KEYWORDS_EN",16=>"UDK",17=>"MSC",18=>"NIR_SUBJECT",19=>"NIR_SUBJECT_EN",20=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	)
);?> -->
<?$arFiltR = array("PROPERTY_RANK" => $arResult['ID']);
		/*test_dump($arFiltR);
		test_dump(getCurrentID(7, $_REQUEST["ELEMENT_CODE"]));*/?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"omi_people", 
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
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
		"COMPONENT_TEMPLATE" => "omi_people",
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
			0 => "FULL_NAME",
			1 => "FULL_NAME_EN",
			2 => "EMAIL",
			3 => "SURNAME",
			4 => "NAME",
			5 => "PATRONIM",
			6 => "DESCRIPTION",
			7 => "SURNAME_EN",
			8 => "NAME_EN",
			9 => "PATRONIM_EN",
			10 => "DESCRIPTION_EN",
			11 => "RANK",
			12 => "DEGREE",
			13 => "DATE_OF_BIRTH",
			14 => "VAK_SPEC_EN",
			15 => "VAK_SPEC",
			16 => "KEYWORDS",
			17 => "KEYWORDS_EN",
			18 => "UDK",
			19 => "MSC",
			20 => "NIR_SUBJECT",
			21 => "NIR_SUBJECT_EN",
			22 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "FULL_NAME",
			1 => "FULL_NAME_EN",
			2 => "EMAIL",
			3 => "SURNAME",
			4 => "NAME",
			5 => "PATRONIM",
			6 => "DESCRIPTION",
			7 => "SURNAME_EN",
			8 => "NAME_EN",
			9 => "PATRONIM_EN",
			10 => "DESCRIPTION_EN",
			11 => "RANK",
			12 => "DEGREE",
			13 => "DATE_OF_BIRTH",
			14 => "VAK_SPEC_EN",
			15 => "VAK_SPEC",
			16 => "KEYWORDS",
			17 => "KEYWORDS_EN",
			18 => "UDK",
			19 => "MSC",
			20 => "NIR_SUBJECT",
			21 => "NIR_SUBJECT_EN",
			22 => "",
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
		"SEF_FOLDER" => "/scientist/",
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
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>