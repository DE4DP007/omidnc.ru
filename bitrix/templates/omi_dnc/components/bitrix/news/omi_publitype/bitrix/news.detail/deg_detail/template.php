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
		<h3 class="bt-margin15px text-center"><?=$arResult["PROPERTIES"][GetMessage("TITLE")]["VALUE"]?></h3>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?endif?>
	<div style="clear:both"></div>
	<br/>
	<div class="fs16px">
		<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
	        <div class="sci-prop">
				<b class="sci-prop-color-green"><?=$arProperty["NAME"]?>:</b>
				<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
					<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
				<?else:?>
					<?=$arProperty["DISPLAY_VALUE"];?>
				<?endif?>
			</div>
		<?endforeach;?>
	</div>
	<?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y"):?>
		<div class="news-detail-share">
			<noindex>
				<?$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
						"HANDLERS" => $arParams["SHARE_HANDLERS"],
						"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
						"PAGE_TITLE" => $arResult["~NAME"],
						"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
						"HIDE" => $arParams["SHARE_HIDE"],
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);?>
			</noindex>
		</div>
	<?endif;?>
</div>

<?$count = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 9, 'PROPERTY_PUBLTYPE' => $arResult['ID']), array(), false, array('ID', 'NAME'))?>
<?if($count > 0):?>
	<div class="row">
		<div class="col-lg-12">
			<h4 class="text-center bt-margin15px"><?=GetMessage('PUB_LIST')?></h4>
			<?$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL", "PROPERTY_BIBLIODATA");
			$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PUBLTYPE" => $arResult['ID']);
			$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
			$res->NavStart(10);
			while($ob = $res->GetNextElement()):
				$arFields = $ob->GetFields();
				$arProp = $ob->GetProperties();?>
				<a href="<?=$arFields['DETAIL_PAGE_URL']?>"><?=$arProp[GetMessage('BIBLIODATA')]['VALUE']?></a><br/>
			<?endwhile;?>
			<?$res->NavPrint($prop['PUB_LIST'], false, "text", "/bitrix/templates/omi_dnc/pagination/pagination.php");?>
		</div>
	</div>
<?endif;?>
