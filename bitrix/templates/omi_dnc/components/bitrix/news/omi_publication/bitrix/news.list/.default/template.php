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
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
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
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<p><?echo $arItem["PREVIEW_TEXT"];?></p>
		<?endif;?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small style="border:1px red;">
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
	    <?
			$someProps = $arItem["DISPLAY_PROPERTIES"];
			//test_dump($someProps);
			unset($someProps["TITLE"]);
			unset($someProps["ANNOTATION"]);
			unset($someProps['AUTHORS']);
			unset($someProps[GetMessage('AUTHORS_OTHER')]);
			//test_dump($someProps["TITLE"]["NAME"]);
		?>
		<small>
			<span class="propertyname"><?=$arItem['PROPERTIES'][GetMessage('AUTHORS_OTHER')]['NAME']?>:</span>&nbsp;
			<?if (is_array($arItem['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE'])):?>
				<?=implode(",&nbsp;", $arItem['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE'])?>
			<?else:?>
				<?=$arItem['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE']?>
			<?endif;?>
			<?if(is_array($arItem['DISPLAY_PROPERTIES'][GetMessage('AUTHORS_OTHER')]['DISPLAY_VALUE'])):?>
				/ <?=implode(",&nbsp;", $arItem['DISPLAY_PROPERTIES'][GetMessage('AUTHORS_OTHER')]['DISPLAY_VALUE'])?>
			<?elseif ($arItem['DISPLAY_PROPERTIES'][GetMessage('AUTHORS_OTHER')]['DISPLAY_VALUE']):?>
				/ <?=$arItem['DISPLAY_PROPERTIES'][GetMessage('AUTHORS_OTHER')]['DISPLAY_VALUE']?>
			<?endif;?>
		</small><br/>
		<?//foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
			foreach($someProps as $pid=>$arProperty):
		?>
		<?//test_dump($arItem["DISPLAY_PROPERTIES"]);?>
			<small>
			<span class="propertyname"><?=$arProperty["NAME"]?>:</span>&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
		<div style="clear:both"></div>
	<?endif?>
	</p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><div class="container centered fs16px"><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
</div>