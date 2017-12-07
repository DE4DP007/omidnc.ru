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

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        Ученые степени <small>сотрудников</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=SITE_DIR?>">Главная</a></li>
            <li class="active">Ученые степени</li>
        </ol>
    </div>
</div>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<div class="container-fluid">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

        <p class="col-md-4 col-sm-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?$i++;?>
            <b><a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                <?=$arItem['NAME']?>
            </a></b><br/>
            <?if($arItem['PROPERTIES']['SHORT_TITLE']['VALUE']):?>
                <?=$arItem['PROPERTIES']['SHORT_TITLE']['NAME']?>: 
                <?=$arItem['PROPERTIES']['SHORT_TITLE']['VALUE']?>
                <br/>
            <?endif;?>
            <?$arFilterI = Array("IBLOCK_ID"=>5, "PROPERTY_DEGREE" => $arItem['ID']);
            $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));?>
            <?if(getSize(5, "PROPERTY_DEGREE", $arItem['ID']) != 0):?>
                Список сотрудников:<br/>
                <?while($obI = $resI->GetNextElement()):?>
                    <?$arPropI = $obI->GetProperties();
                    $arFieldsI = $obI->GetFields();?>
                    <a href="<?=$arFieldsI['DETAIL_PAGE_URL']?>"> <?=$arPropI['FULL_NAME']['VALUE']?>
                    </a><br/>
                <?endwhile;?>
            <?endif;?>
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