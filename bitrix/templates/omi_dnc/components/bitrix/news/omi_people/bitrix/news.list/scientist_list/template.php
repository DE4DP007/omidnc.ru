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

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>

    <div class="grid-sizer"></div>

    <?foreach($arResult["ITEMS"] as $key=>$arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

        <div class="grid-item">
            <div class="container-fluid omi-card omi-card-shadowed no-padding" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                    <div class="ratio ratio-16-9"><div class="image" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div></div>
                <?endif;?>
                
                <div class="scientist-det-group col-md-12">
                    <b>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <?=$arItem["PROPERTIES"][GetMessage('NAME')]['VALUE']?>
                        </a>
                    </b>
                    <br/>
                    <?$arFilterI = Array("IBLOCK_ID"=>7, "ID" => $arItem['PROPERTIES']['RANK']['VALUE']);
                    $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
                    if($resI != 0):
                        while($obI = $resI->GetNextElement()):
                            $arPropI = $obI->GetProperties();
                            $arFieldsI = $obI->GetFields();?>
                            <a href="<?=$arItem["PROPERTIES"]["RANK_URL"]?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?></a><br/>
                        <?endwhile;
                    endif;
                    $arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arItem['PROPERTIES']['DEGREE']['VALUE']);
                    $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
                    if($resI != 0):
                        while($obI = $resI->GetNextElement()):
                            $arPropI = $obI->GetProperties();
                            $arFieldsI = $obI->GetFields();?>
                            <a href="<?=$arItem["PROPERTIES"]["DEGREE_URL"]?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?></a><br/>
                        <?endwhile;
                    endif;?>
                </div>

                <div class="col-md-12 test-justify">
                    <p class="card-element"><?=mb_strimwidth($arItem['PROPERTIES'][GetMessage('DESCRIPTION')]['VALUE'],0,500, "...")?></p>
                    <ul class="list-inline text-center card-element">
                        <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a></li>
                    </ul>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-primary sci-details">
                        <span class="glyphicon glyphicon-share-alt"></span>
                        <?=GetMessage("MORE")?>
                    </a>
                </div>

            </div>
        </div>
    <?endforeach;?>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><div class="container-fluid centered"><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
<div class="clearfix"></div>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>