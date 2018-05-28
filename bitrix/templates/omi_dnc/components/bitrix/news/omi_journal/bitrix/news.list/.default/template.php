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
<div class="news-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<?$i=0;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<?if ($i%2==0):?>
			<div class="container bt-margin15px">
		<?endif;?>
		<div class="col-md-6 col-sm-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<p class="news-item">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<img
								class="preview_picture"
								border="0"
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								style="float:left"
							/>
						</a>
					<?else:?>
						<img
							class="preview_picture"
							border="0"
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							style="float:left"
						/>
					<?endif;?>
				<?endif?>
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<span class="news-date-time"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
				<?endif?>
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<b class="sci-prop-color-green"><?=$arItem["PROPERTIES"][GetMessage("TITLE")]["NAME"]?>:&nbsp;</b>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<b><?=$arItem['DISPLAY_PROPERTIES'][GetMessage("TITLE")]['VALUE']?></b>
						</a>
						<br/>
					<?else:?>
						<b><?=$arItem["PROPERTIES"][GetMessage("TITLE")]["NAME"]?></b><br/>
					<?endif;?>
				<?endif;?>
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<?=$arItem["PREVIEW_TEXT"];?>
				<?endif;?>
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>

				<?endif?>
				<?foreach($arItem["FIELDS"] as $code=>$value):?>
					<small>
						<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
					</small><br/>
				<?endforeach;?>
				<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					<?if($arProperty['CODE'] != GetMessage('TITLE')):?>
						<small>
							<b class="sci-prop-color-green"><?=$arProperty["NAME"]?>:</b>
							<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
								<?//=implode("&nbsp;",$arProperty["DISPLAY_VALUE"]);?>
							<?else:?>
								<!-- <?=$arProperty["DISPLAY_VALUE"];?> -->
								<?=mb_strimwidth($arProperty["DISPLAY_VALUE"],0,300, "...")?>
							<?endif?>
						</small><br/>
					<?endif;?>
				<?endforeach;?>

				<?$arFilter = array('IBLOCK_ID' => 9, "PROPERTY_JOURNAL" => $arItem['ID']);
				$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID', 'PROPERTY_JOURNAL'));?>
				<?if ($el = $res->Fetch()):?>
					<b class="sci-prop-color-green"><?=GetMessage("ART_COUNT")?>:</b> <?=$el['CNT']?>
				<?endif;?>
				<div style="clear:both"></div>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn-primary sci-details"><?=GEtMessage("SHOW")?></a>
			</p>
		</div>
		<?if ($i%2==1):?>
			</div>
		<?endif;?>
		<?$i++?>
	<?endforeach;?>
	<?if ($i%2==1):?>
</div>
<?endif;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br/><div class="container-fluid centered"><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
</div>
