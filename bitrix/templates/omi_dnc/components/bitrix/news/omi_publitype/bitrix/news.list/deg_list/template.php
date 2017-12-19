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
	<?=$arResult["NAV_STRING"]?><br />
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
            <?if(CIBlockElement::GetList(array(), array('IBLOCK_ID' => 9, "PROPERTY_PUBLTYPE" => $arItem['ID']), array(), false, array('ID', 'NAME')) != 0):?>
                <b class="sci-prop-color-green"><?=GetMessage('PUB_LIST')?>:</b><br/>
                <?while($obI = $resI->GetNextElement()):?>
                    <?$arPropI = $obI->GetProperties();
                    $arFieldsI = $obI->GetFields();?>
                    <a href="<?=$arFieldsI['DETAIL_PAGE_URL']?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?>
                    </a><br/>
                <?endwhile;?>
            <?endif;?>
            <?$resI->NavPrint($prop['PUB_LIST']);?>
        </p>

        <?if ($i%3 == 0):?>
            <div class="clearfix"></div>
        <?endif;?>
    <?endforeach;?>
</div>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="clearfix"></div>