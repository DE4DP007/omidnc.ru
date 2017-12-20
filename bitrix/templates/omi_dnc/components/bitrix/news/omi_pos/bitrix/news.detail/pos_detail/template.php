<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="news-detail">

	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<?//test_dump($arResult)?>
		<h3 class="bt-margin15px text-center"><?=$arResult["PROPERTIES"][GetMessage("TITLE")]["VALUE"]//=$arResult["NAME"];?></h3>
	<?endif;?>
<!--	<?/*if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):*/?>
		<p><?/*=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);*/?></p>
	--><?/*endif;*/?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?//echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?//echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?//echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
<!--	<?/*foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			*/?><?/*=GetMessage("IBLOCK_FIELD_".$code)*/?>:&nbsp;<?/*
			if (!empty($value) && is_array($value))
			{
				*/?><img border="0" src="<?/*=$value["SRC"]*/?>" width="<?/*=$value["WIDTH"]*/?>" height="<?/*=$value["HEIGHT"]*/?>"><?/*
			}
		}
		else
		{
			*/?><?/*=GetMessage("IBLOCK_FIELD_".$code)*/?>:&nbsp;<?/*=$value;*/?><?/*
		}
		*/?><br />
	--><?/*endforeach;*/
	echo "<div class=\"fs16px\">";
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
        <div class="sci-prop">
		<b class="sci-prop-color-green"><?=$arProperty["NAME"]?>:</b>
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		</div>
	<?endforeach;
	echo "</div>";
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>

<div class="row">
	<div class="col-lg-12">
	    <!-- <h2 class="page-header"> -->
	    <h3 class="text-center bt-margin15px">
	        <!--Список сотрудников на этой должности-->
			<?//=$arProp[$prop['TITLE']]['VALUE'];echo $arProp[$prop['TITLE']]['FULL_NAME'];?>
			<?=GetMessage('SCI_LIST')?>
	    </h3>
	</div>

	<?global $arFiltR;
	$arFiltR = array("PROPERTY_RANK" => $arResult['ID']);
	/*test_dump($arFiltR);
	test_dump(getCurrentID(7, $_REQUEST["ELEMENT_CODE"]));*/?>
	<?$APPLICATION->IncludeComponent(
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
	        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
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
	            0 => GetMessage('NAME'),
	            1 => GetMessage('SURNAME'),
	            2 => GetMessage('PATRONIM'),
	            3 => "RANK",
	            4 => "DEGREE",
	            5 => "FULL_NAME",
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
<?$APPLICATION->AddChainItem($arResult["PROPERTIES"][GetMessage("TITLE")]['VALUE']);?>
