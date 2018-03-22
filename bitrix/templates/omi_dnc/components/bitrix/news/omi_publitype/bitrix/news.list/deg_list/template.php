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
$i=0;?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<div class="container-fluid centered"><?=$arResult["NAV_STRING"]?></div><br />
<?endif;?>

<div class="container-fluid">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

        <p class="col-md-6 col-sm-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?$i++;?>
            <b><a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                <?=$arItem['PROPERTIES'][GetMessage('TITLE')]['VALUE']?>
            </a></b><br/>
            <?if($arItem['PROPERTIES'][GetMessage('SHORT_TITLE')]['VALUE']):?>
                <b class="sci-prop-color-green"><?=$arItem['PROPERTIES'][GetMessage('SHORT_TITLE')]['NAME']?>:</b> 
                <?=$arItem['PROPERTIES'][GetMessage('SHORT_TITLE')]['VALUE']?>
                <br/>
            <?endif;?>
            <?$arFilterI = Array("IBLOCK_ID"=>9, "PROPERTY_PUBLTYPE" => $arItem['ID']);
            $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>5));?>
            <?$count = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 9, "PROPERTY_PUBLTYPE" => $arItem['ID']), array(), false, array('ID', 'NAME'));?>
            <?if($count != 0):?>
                <b class="sci-prop-color-green"><?=GetMessage('PUB_LIST')?>: <?=$count?></b><br/>
            <?endif;?>
        </p>

        <?if ($i%3 == 0):?>
            <div class="clearfix"></div>
        <?endif;?>
    <?endforeach;?>
</div>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><div class="container-fluid centered"><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
<div class="clearfix"></div>