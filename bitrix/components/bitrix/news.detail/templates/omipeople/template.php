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
		<h3 class="text-center"><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<div class="bt-margin5px text-center">
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
			//echo $prop['RANK_STRING'], ": <a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['TITLE']]['VALUE'], "</a><br>";
			echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['TITLE']]['VALUE'], "</a><br>";
		}
		$arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arProp['DEGREE']['VALUE']);
		$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
		while($obI = $resI->GetNextElement()) {
			$arPropI = $obI->GetProperties();
			$arFieldsI = $obI->GetFields();
			echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['TITLE']]['VALUE'], "</a><br>";
		}
	}
	?>
	</div>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<p class="text-justify">Краткое описание Краткое описание Краткое описание
		Краткое описание Краткое описание Краткое описание Краткое описание Краткое описание Краткое описание Краткое описание
	</p>
	<div class="col-md-12 text-justify">
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	</div>
	<div style="clear:both"></div>
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
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
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


    <?
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