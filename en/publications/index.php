<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Публикации");
?><?
if(SITE_ID == s1) {
	$prop["HEAD"] = "Публикации";
	$prop['HEAD_SMALL'] = "сотрудников отдела";
	$prop["MAIN"] = "Главная";
	$prop["TITLE"] = "TITLE";
	$prop['ANNOTATION'] = "ANNOTATION";
	$prop['BIBLIODATA'] = "BIBLIODATA";
	$prop['LINKS'] = "/publications/";
} else {
	$prop["HEAD"] = "Publications";
	$prop['HEAD_SMALL'] = "of OMI's scientists";
	$prop["MAIN"] = "Main";
	$prop["TITLE"] = "ENTITLE";
	$prop['ANNOTATION'] = "ENANNOTATION";
	$prop['BIBLIODATA'] = "BIBLIODATAEN";
	$prop['LINKS'] = "/en/publications/";
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?$APPLICATION->ShowTitle()?>
		</h1>
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"omi_breadcrumb",
			Array(
				"COMPONENT_TEMPLATE" => "omi_breadcrumb",
				"PATH" => "",
				"SITE_ID" => "s2",
				"START_FROM" => "0"
			)
		);?>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"omi_publication", 
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
		"COMPONENT_TEMPLATE" => "omi_publication",
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
			1 => "ANNOTATION",
			2 => "AUTHORS",
			3 => "PUBLTYPE",
			4 => "JOURNAL",
			5 => "BIBLIODATA",
			6 => "isOMI",
			7 => "FULLTEXT",
			8 => "UDK",
			9 => "KEYWORDS",
			10 => "PUBLDATE",
			11 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "biblio",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "TITLE_EN",
			1 => "ENANNOTATION",
			2 => "AUTHORS",
			3 => "PUBLTYPE",
			4 => "JOURNAL",
			5 => "PUBLDATE",
			6 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/en/publications/",
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
		"USE_FILTER" => "Y",
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