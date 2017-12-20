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

<div class="col-md-6 col-sm-12">
        <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
        <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

        <?if ($key % 2 == 0):?>

        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>">

            <div class="thumbnail container-fluid">
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                    <img class="thumbnail" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                <?endif;?>
                
                <div class="scientist-det-group col-md-12">
                    <b>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <?=$arItem["PROPERTIES"][GetMessage('NAME')]['VALUE']?>
                        </a>
                    </b>
                    <br/>
                    <?$arFilterI = Array("IBLOCK_ID"=>7, "ID" => $arItem['PROPERTIES']['RANK']['VALUE']);
                    $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));?>
                    <!-- <?print_r($resI);?> -->
                    <?if($resI != 0):?>
                        <?while($obI = $resI->GetNextElement()):?>
                            <?$arPropI = $obI->GetProperties();
                            $arFieldsI = $obI->GetFields();?>
                            <a href="<?=$arItem["PROPERTIES"]["RANK_URL"]?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?>
                            </a><br/>
                        <?endwhile;?>
                    <?endif;?>
                    <?$arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arItem['PROPERTIES']['DEGREE']['VALUE']);
                    $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));?>
                    <!-- <?print_r($resI);?> -->
                    <?if($resI != 0):?>
                        <?while($obI = $resI->GetNextElement()):?>
                            <?$arPropI = $obI->GetProperties();
                            $arFieldsI = $obI->GetFields();?>
                            <a href="<?=$arItem["PROPERTIES"]["DEGREE_URL"]?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?>
                            </a><br/>
                        <?endwhile;?>
                    <?endif;?>
                    <br/>
                </div>

                    <?/*<p>< ?=$arItem["PREVIEW_TEXT"];?></p>*/?>

                <div class="col-md-12 test-justify">
                    <?=mb_strimwidth($arItem['PROPERTIES'][GetMessage('DESCRIPTION')]['VALUE'],0,500, "...")?>
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
        <?endif?>
    <?endforeach;?>
</div>
<div class="col-md-6 col-sm-12">
    <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
    <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

    <?if ($key % 2 != 0):?>

    <div id="<?=$this->GetEditAreaId($arItem['ID']);?>">

        <div class="thumbnail container-fluid">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <img class="thumbnail" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <?endif;?>
            
            <div class="scientist-det-group col-md-12">
                <b>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <?=$arItem["PROPERTIES"][GetMessage('NAME')]['VALUE']?>
                    </a>
                </b>
                <br/>
                <?$arFilterI = Array("IBLOCK_ID"=>7, "ID" => $arItem['PROPERTIES']['RANK']['VALUE']);
                $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));?>
                <!-- <?print_r($resI);?> -->
                <?if($resI != 0):?>
                    <?while($obI = $resI->GetNextElement()):?>
                        <?$arPropI = $obI->GetProperties();
                        $arFieldsI = $obI->GetFields();?>
                        <a href="<?=$arItem["PROPERTIES"]["RANK_URL"]?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?>
                        </a><br/>
                    <?endwhile;?>
                <?endif;?>
                <?$arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arItem['PROPERTIES']['DEGREE']['VALUE']);
                $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));?>
                <!-- <?print_r($resI);?> -->
                <?if($resI != 0):?>
                    <?while($obI = $resI->GetNextElement()):?>
                        <?$arPropI = $obI->GetProperties();
                        $arFieldsI = $obI->GetFields();?>
                        <a href="<?=$arItem["PROPERTIES"]["DEGREE_URL"]?>"> <?=$arPropI[GetMessage('TITLE')]['VALUE']?>
                        </a><br/>
                    <?endwhile;?>
                <?endif;?>
            </div>

                <?/*<p>< ?=$arItem["PREVIEW_TEXT"];?></p>*/?>

            <div class="col-md-12 test-justify">
                <?=mb_strimwidth($arItem['PROPERTIES'][GetMessage('DESCRIPTION')]['VALUE'],0,500, "...")?>
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
    <?endif?>
<?endforeach;?>
</div>

<!-- <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
    <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

    <div class="col-md-6 col-sm-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

        <div class="thumbnail container-fluid">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <img class="thumbnail" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <?endif;?>
            
            <div class="scientist-det-group col-md-12">
                <b>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <?=$arItem["PROPERTIES"][GetMessage('NAME')]['VALUE']?>
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
                <?=mb_strimwidth($arItem['PROPERTIES'][GetMessage('DESCRIPTION')]['VALUE'],0,500, "...")?>
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
<?endforeach;?> -->

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="clearfix"></div>
