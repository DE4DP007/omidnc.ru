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
<div class="news-detail ">
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <img
            class="detail_picture img-rounded img-thumbnail"
            border="0"
            src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
            width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
            height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
            alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
            title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
        />
    <?endif?>

    <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
        <h2 class="text-center"><?=$arResult["NAME"]?></h2>
    <?endif;?>

    <h4 class="text-center">
        <?= $arResult["DISPLAY_PROPERTIES"]["AUTHORS"]["DISPLAY_VALUE"]?>
    </h4>

    <div class="row">
        <p class="col-sm-6 col-xs-12 text-left">
            <b>УДК:&nbsp;  <?= $arResult["PROPERTIES"]["UDK"]["VALUE"]?></b>
        </p>

        <p class="col-sm-6 col-xs-12 text-right">
            <b><?= $arResult["DISPLAY_PROPERTIES"]["PUBLTYPE"]["DISPLAY_VALUE"]?></b>
        </p>
    </div>


    <p class="text-justify">
        <?=$arResult["DETAIL_TEXT"];?>
    </p>

    <div class="row">
        <p class="text-right col-md-12"><b>
                <?= $arResult["PROPERTIES"]["PUBLDATE"]["NAME"]?>:&nbsp;
                <?= $arResult["PROPERTIES"]["PUBLDATE"]["VALUE"]?>
        </b></p>
    </div><br/>
    <p><b>
        <?= $arResult["PROPERTIES"]["BIBLIODATA"]["NAME"]?>:&nbsp;</b><br/>
        <?= $arResult["PROPERTIES"]["BIBLIODATA"]["VALUE"]?>
    </p><br><br>

    <h5 class="text-center">
        <? $pather = $arResult["DISPLAY_PROPERTIES"]["FULLTEXT"]["DISPLAY_VALUE"];
           ?>
        <a href="<?=$pather?>"
        class="btn btn-primary btn-large"><b>
                <span class="glyphicon glyphicon-save"></span>&nbsp;
                СКАЧАТЬ ПОЛНЫЙ ТЕКСТ
        </b></a>
    </h5>
    <br><br>


</div>