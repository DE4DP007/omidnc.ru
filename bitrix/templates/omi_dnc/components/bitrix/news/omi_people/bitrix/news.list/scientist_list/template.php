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


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>


	<div class="col-md-6 col-sm-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?$i++;//test_dump($arit)?>

        <div class="thumbnail container-fluid">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <img class="thumbnail" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <?endif;?>
            
            <div class="scientist-det-group col-md-12">
                <b>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <?=$arItem["NAME"]?>
                    </a>
                </b>
                <br/>
                <a href="<?=$arItem["PROPERTIES"]["RANK_URL"]?>">
                    <?=$arItem["PROPERTIES"]["RANK_NAME"]?>
                </a>
                <br/>
                <a href="<?=$arItem["PROPERTIES"]["DEGREE_URL"]?>">
                    <?=$arItem["PROPERTIES"]["DEGREE_NAME"]?>
                </a>
                <br/>
            </div>

                <?/*<p>< ?=$arItem["PREVIEW_TEXT"];?></p>*/?>

            <div class="col-md-12 test-justify">
                <?=mb_strimwidth($arItem['PROPERTIES']['DESCRIPTION']['VALUE'],0,500, "...")?>
                <div class="caption">
                    <ul class="list-inline text-center">
                        <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-primary sci-details">
                    <span class="glyphicon glyphicon-share-alt"></span>
                    <?=GetMessage("MORE")?>
                </a>
            </div>
        </div>
    </div>
    <?if ($i%3 == 0):?>
        <div class="clearfix"></div>
    <?endif;?>
<?endforeach;?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="clearfix"></div>