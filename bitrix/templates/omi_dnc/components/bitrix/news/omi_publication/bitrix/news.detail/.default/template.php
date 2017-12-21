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
        <h3 class="art-header text-center"><?=$arResult["PROPERTIES"][GetMessage('TITLE')]["VALUE"]//=$arResult["NAME"]?></h3>
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
                echo "<a class=\"greeners\"href=", $arFields1['DETAIL_PAGE_URL'], ">", $arProp1[GetMessage('FULL_NAME')]['VALUE'], "</a> ";
            }
        }
        ?>
    </div>
    <?if($arProp['UDK']['VALUE'] != null):?>
        <h3 class="art-udc text-left journhead">
            <?=GetMessage('UDK')?>: <?=$arProp['UDK']['VALUE'];?>
        </h3>
    <?endif?>
    <div class="fs16px text-justify">
        <?=$arResult["PROPERTIES"][GetMessage("ANNOTATION")]["VALUE"]?>
    </div>
    <div style="clear:both"></div>

    <div class="top-margin15px bt-margin72px">
        <?if($arProp['PUBLTYPE']['VALUE'] != null):?>
            <div class='sci-prop'>
            <?$arFilter = Array("IBLOCK_ID" => 10, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arProp['PUBLTYPE']['VALUE']);?>            <?$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);?>
            <?while($ob2 = $res->GetNextElement()):?>
                <?$arFields2 = $ob2->GetFields();?>
                <?$arProp2 = $ob2->GetProperties();?>
                <b class='sci-prop-color-green'>
                    <?=GetMessage('PUBLTYPE_STR')?>:
                </b>
                <a href="<?=$arFields2['DETAIL_PAGE_URL']?>">
                    <?=$arProp2[GetMessage('TITLE')]['VALUE']?> 
                </a>
            <?endwhile;?>
            </div>
        <?endif;?>
        <?if($arProp['isOMI']['VALUE'] != null):?>
            <div class='sci-prop'>
                <b class='sci-prop-color-green'>
                    <?=GetMessage('IS_OMI_STR')?>:
                </b>
                <?=GetMessage('IS_OMI_STR_VAL')?>
            </div>
        <?endif;?>
        <?if ($arProp['KEYWORDS']['VALUE']!=null):?>
            <div class='sci-prop'>
                <b class='sci-prop-color-green'>
                    <?=GetMessage('KEYWORDS')?>:
                </b>
            <?$i=0;?>
            <?foreach ($arProp['KEYWORDS']['VALUE'] as $item):?>
                <?if ($i>0):?> 
                    ,
                <?endif;?>
                <?=$item?>
            <?endforeach;?>
            </div>
        <?endif;?>
        <?if($arProp['JOURNAL']['VALUE'] != null):?>
            <div class='sci-prop'>
                <?$arFilter = Array("IBLOCK_ID" => 11, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arProp['JOURNAL']['VALUE']);
                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);?>
                <?while ($ob3 = $res->GetNextElement()):?>
                    <?$arFields3 = $ob3->GetFields();
                    $arProp3 = $ob3->GetProperties();?>
                    <b class='sci-prop-color-green'>
                        <?=GetMessage('JOURNAL')?>:
                    </b>
                    <a href="<?=$arFields3['DETAIL_PAGE_URL']?>">
                        <?=$arProp3[GetMessage('TITLE')]['VALUE']?>
                    </a>
                <?endwhile;?>
            </div>
        <?endif;?>
        <?if($arProp['PUBLDATE']['VALUE'] != null):?>
            <div class='sci-prop'>
                <b class='sci-prop-color-green'>
                    <?=GetMessage('PUBL_DATE')?>:
                </b>
                <?=$arProp['PUBLDATE']['VALUE']?>
            </div>
        <?endif;?>
        <?if($arProp[GetMessage('BIBDATA')]['VALUE'] != null):?>
            <div class='sci-prop'>
                <b class='sci-prop-color-green'> 
                    <?=$arProp[GetMessage('BIBDATA')]['NAME']?>:
                </b>
                <?=$arProp[GetMessage('BIBDATA')]['VALUE']?>
            </div>
        <?endif;?>
    </div>
    <div class='sci-prop text-center'>
        <a href="<?=$arResult['LIST_PAGE_URL']?>" class="btn btn-lg btn-primary">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <?=GetMessage("TO_ISSUE")?>
        </a>
        <?if($arProp['FULLTEXT']['VALUE'] != null):?>
            <a class="btn btn-success btn-lg" href="<?=$arProp['FULLTEXT']['VALUE']?>">
                <span class="glyphicon glyphicon-book"></span>
                <?=GetMessage('FULL_TEXT')?>
            </a>
        <?endif;?>
    </div>
        <!-- test_dump($arProp[$prop['BIBDATA']]['NAME']); -->


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