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
<?
if(SITE_ID == s1) {
	$prop['TITLE'] = "TITLE";
	$prop['HEAD'] = "Публикация";
	$prop['HEAD_SMALL'] = "отдела";
	$prop['MAIN'] = "Главная";
	$prop['TYPE'] = "Публикации";
	$prop['ANNOTATION'] = "ANNOTATION";
	$prop['BIBLIODATA'] = "BIBLIODATA";
	$prop['AUTHOR_STR'] = "Авторы";
	$prop['FULL_NAME'] = "FULL_NAME";
	$prop['PUBLTYPE_STR'] = "Тип публикации";
	$prop['JOURNAL'] = "Издание";
	$prop['IS_OMI_STR'] = "Выполнено в ОМИ";
	$prop['FULL_TEXT'] = "Скачать полный текст";
	$prop['UDK'] = "УДК";
	$prop['KEYWORDS'] = "Ключевые слова";
	$prop['PUBL_DATE'] = "Дата издания";
	$prop['IS_OMI_STR_VAL'] = "Да";
	$prop['BIBDATA'] = "BIBLIODATA";

} else {
	$prop['TITLE'] = "TITLE_EN";
	$prop['HEAD'] = "Publication";
	$prop['HEAD_SMALL'] = "of OMI's scientists";
	$prop['MAIN'] = "Main";
	$prop['TYPE'] = "Publications";
	$prop['ANNOTATION'] = "ENANNOTATION";
	$prop['BIBLIODATA'] = "BIBLIODATAEN";
	$prop['AUTHOR_STR'] = "Authors";
	$prop['FULL_NAME'] = "FULL_NAME_EN";
	$prop['PUBLTYPE_STR'] = "Publication type";
	$prop['JOURNAL'] = "Journal";
	$prop['IS_OMI_STR'] = "Made in OMI";
	$prop['FULL_TEXT'] = "Download full text";
	$prop['UDK'] = "UDC";
	$prop['KEYWORDS'] = "Keywords";
	$prop['PUBL_DATE'] = "Publication date";
	$prop['IS_OMI_STR_VAL'] = "Yes";
	$prop['BIBDATA'] = "BIBLIODATAEN";
}
?>
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3 class="art-header text-center"><?=$arResult["PROPERTIES"][$prop["TITLE"]]["VALUE"]//=$arResult["NAME"]?></h3>
	<?endif;?>
	<?
	//test_dump($arResult["ID"]);
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $arResult["ID"]);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
	$i=0;
	while($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();
		$arProp = $ob->GetProperties();
		///*авторы*/echo $prop['AUTHOR_STR'], ": ";
		//test_dump($arProp);
		//echo "<div>",$i,"</div>";$i++;
	}
	?>
	<div class="text-center authholder fs16px">
		<?
		//test_dump($arProp['AUTHORS']);
		foreach ($arProp['AUTHORS']['VALUE'] as $item) {
			$arFilter = Array("IBLOCK_ID" => 12, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $item);
			$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);

			while ($ob1 = $res->GetNextElement()) {
				$arFields1 = $ob1->GetFields();
				$arProp1 = $ob1->GetProperties();
				//test_dump($arProp1["NAME"]["VALUE"]);
				echo "<a class=\"greeners\"href=", $arFields1['DETAIL_PAGE_URL'], ">", $arProp1[$prop['FULL_NAME']]['VALUE'], "</a> ";
			}
		}
		?>
	</div>
	<?if($arProp['UDK']['VALUE'] != null):?>
	<h3 class="art-udc text-left journhead"><?echo $prop['UDK'], ": ", $arProp['UDK']['VALUE'];?></h3>
	<?endif?>
	<div class="fs16px text-justify">
		<? echo $arResult["PROPERTIES"][$prop["ANNOTATION"]]["VALUE"]?>
<!--	<?/*if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):*/?>
		<p><?/*=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);*/?></p>
	<?/*endif;*/?>
	<?/*if($arResult["NAV_RESULT"]):*/?>
		<?/*if($arParams["DISPLAY_TOP_PAGER"]):*/?><?/*=$arResult["NAV_STRING"]*/?><br /><?/*endif;*/?>
		<?/*echo $arResult["NAV_TEXT"];*/?>
		<?/*if($arParams["DISPLAY_BOTTOM_PAGER"]):*/?><br /><?/*=$arResult["NAV_STRING"]*/?><?/*endif;*/?>
	<?/*elseif(strlen($arResult["DETAIL_TEXT"])>0):*/?>
		<?/*//echo $arResult["DETAIL_TEXT"];
		test_dump($arResult);*/?>
	<?/*else:*/?>
		<?/*//echo $arResult["PREVIEW_TEXT"];
		test_dump($arResult);
		*/?>
	--><?/*endif*/?>
	</div>
	<div style="clear:both"></div>




	<div class="top-margin15px bt-margin72px">
	<?
		if($arProp['PUBLTYPE']['VALUE'] != null) {
			echo "<div class='sci-prop'>";
			$arFilter = Array("IBLOCK_ID" => 10, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arProp['PUBLTYPE']['VALUE']);
			$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);
			while ($ob2 = $res->GetNextElement()) {
				$arFields2 = $ob2->GetFields();
				$arProp2 = $ob2->GetProperties();
				echo "<b class='sci-prop-color-green'>", $prop['PUBLTYPE_STR'], ":</b> <a href=", $arFields2['DETAIL_PAGE_URL'], ">", $arProp2[$prop['TITLE']]['VALUE'], "</a>";
			}
			echo "</div>";
		}
		if($arProp['isOMI']['VALUE'] != null) {
			echo "<div class='sci-prop'>";
			echo "<b class='sci-prop-color-green'>", $prop['IS_OMI_STR'], ":</b> ", $prop['IS_OMI_STR_VAL'];
			echo "</div>";
		}
		if ($arProp['KEYWORDS']['VALUE']!=null){
			echo "<div class='sci-prop'>";
			echo "<b class='sci-prop-color-green'>", $prop['KEYWORDS'],":</b> ";
			$i=0;
			foreach ($arProp['KEYWORDS']['VALUE'] as $item) {
				if ($i>0) echo ",";
				echo $item;
			}
			echo "</div>";
		}

		if($arProp['JOURNAL']['VALUE'] != null) {
		echo "<div class='sci-prop'>";
		$arFilter = Array("IBLOCK_ID" => 11, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arProp['JOURNAL']['VALUE']);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);
		while ($ob3 = $res->GetNextElement()) {
		$arFields3 = $ob3->GetFields();
		$arProp3 = $ob3->GetProperties();
		echo $prop['JOURNAL'], ": <a href=", $arFields3['DETAIL_PAGE_URL'], ">", $arProp3[$prop['TITLE']]['VALUE'], "</a>";
		}
		echo "</div>";
	}
		if($arProp['PUBLDATE']['VALUE'] != null) {
			echo "<div class='sci-prop'>";
			echo "<b class='sci-prop-color-green'>", $prop['PUBL_DATE'], ":</b> ", $arProp['PUBLDATE']['VALUE'];
			echo "</div>";
		}
		if($arProp[$prop['BIBDATA']]['VALUE'] != null) {
			echo "<div class='sci-prop'>";
			echo "<b class='sci-prop-color-green'>", $arProp[$prop['BIBDATA']]['NAME'], ":</b> ", $arProp[$prop['BIBDATA']]['VALUE'];
			echo "</div>";
		}
		echo "</div>";
		if($arProp['FULLTEXT']['VALUE'] != null) {
			echo "<div class='sci-prop text-center'>";
			/*echo "<a href=\"/issues/Daghestan-Electronic-Mathematical-Reports-Issue-4/\" class=\"btn btn-lg btn-primary\">
	<span class=\"glyphicon glyphicon-arrow-left\"></span>
	В содержание выпуска    </a>";*/
			echo "<a class=\"btn btn-success btn-lg\" href=", $arProp['FULLTEXT']['VALUE'], "><span class=\"glyphicon glyphicon-book\"></span> ", $prop['FULL_TEXT'], "</a>";
			echo "</div>";
		}
		//test_dump($arProp[$prop['BIBDATA']]['NAME']);
	?>


	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	/*foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;*/
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