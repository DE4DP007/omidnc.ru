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


	<div class="col-md-4 text-center" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?$i++;//test_dump($arit)?>

        <div class="thumbnail">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <img class="img-responsive img-rounded scientistphoto" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <?endif;?>
            <div class="caption">
                <h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <?=$arItem["PROPERTIES"][GetMessage("FULL_NAME")]["VALUE"]?>
                    <br/>
                    <?
                        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
                        $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $arItem['ID']);
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
                                echo "<small><b>", $arPropI[GetMessage('TITLE')]['VALUE'], "</b><br></small>";
                            }
                            $arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arProp['DEGREE']['VALUE']);
                            $resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
                            while($obI = $resI->GetNextElement()) {
                                $arPropI = $obI->GetProperties();
                                $arFieldsI = $obI->GetFields();
                                echo "<small>", $arPropI[GetMessage('TITLE')]['VALUE'], "</small><br>";
                            }
                        }
                    ?>
                </a></h3>

                <?/*<p>< ?=$arItem["PREVIEW_TEXT"];?></p>*/?>

                <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                    </li>
                </ul>
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