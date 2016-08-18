<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Должность детально");?>

<?if(SITE_ID == s1) {
	$prop["MAIN"] = "Главная";
	$prop["POSITIONS"] = "Должности";
	$prop['HEAD'] = "Должность";
	$prop['HEAD_SMALL'] = "сотрудников";
	$prop["TITLE"] = "TITLE";
	$prop["SHORT_TITLE"] = "SHORT_TITLE";
	$prop['SCI_LIST'] = "Список сотрудников";
	$prop['FULL_NAME'] = "FULL_NAME";
} else {
	$prop["MAIN"] = "Main";
	$prop["POSITIONS"] = "Positions";
	$prop['HEAD'] = "Position";
	$prop['HEAD_SMALL'] = "of scientists";
	$prop["TITLE"] = "TITLE_EN";
	$prop["SHORT_TITLE"] = "SHORT_TITLE_EN";
	$prop['SCI_LIST'] = "Scientists list";
	$prop['FULL_NAME'] = "FULL_NAME_EN";
}
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>7, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(7, $_REQUEST["ELEMENT_CODE"]));
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
				<small><?echo $prop['HEAD_SMALL'];?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href=<?echo SITE_DIR;?>><?echo $prop['MAIN'];?></a></li>
				<li class="active"><a href="<?echo SITE_DIR;?>position/"><?echo $prop['POSITIONS']?></a></li>
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
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "DEGREE",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array($prop["TITLE"],$prop["SHORT_TITLE"],""),
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


    <!-- Team Members -->
    <div class="row">
        <div class="col-lg-12">
            <!-- <h2 class="page-header"> -->
            <h3 class="text-center">
                Список сотрудников на этой должности
            </h3>
        </div>

        <?function getCurrentID($iblock_id, $code) {
            if(CModule::IncludeModule("iblock"))
            {
                $arFilter = array("IBLOCK_ID"=>$iblock_id, "CODE" => $code);
                $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>1), array('ID'));
                $element = $res->Fetch();
                if($res->SelectedRowsCount() != 1) return '<p>Элемент не найден</p>';
                else return $element['ID'];
            }
        }

        $arFiltR = Array("PROPERTY_RANK" => getCurrentID(7, $_REQUEST["ELEMENT_CODE"]));
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "scientistlist",
            array(
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
                "COMPONENT_TEMPLATE" => "scientistlist",
                "FILTER_NAME" => "arFiltR",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
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
                "PAGER_TITLE" => "Сотрудники",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "NAME",
                    1 => "PATRONIM",
                    2 => "SURNAME",
                    3 => "RANK",
                    4 => "DEGREE",
                    5 => "",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC"
            ),
            false
        );?>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            equalizeHeights(".same-height");
        });
    </script>






<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>