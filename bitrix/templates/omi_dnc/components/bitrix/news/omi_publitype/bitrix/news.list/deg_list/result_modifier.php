<?php

// RANK
    $arSelect = Array("ID", "PROPERTY_TITLE", "DETAIL_PAGE_URL", "DESCRIPTION");
    $arFilter = Array("IBLOCK_ID" => "7", "ID"=>$arResult["RANK"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $list = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);

    $res = array();
    $resURL = array();

    while($ob = $list->GetNextElement()) {
        $arFields = $ob->GetFields();
        $res[$arFields["ID"]] = $arFields["PROPERTY_TITLE_VALUE"];
        $resURL[$arFields["ID"]] = $arFields["DETAIL_PAGE_URL"];
    }

    for ($i = 0; $i < count($arResult["ITEMS"]); $i++){
        $arResult["ITEMS"][$i]["PROPERTIES"]["RANK_NAME"] = $res[intval($arResult["ITEMS"][$i]["PROPERTIES"]["RANK"]["VALUE"])];
        $arResult["ITEMS"][$i]["PROPERTIES"]["RANK_URL"] = $resURL[intval($arResult["ITEMS"][$i]["PROPERTIES"]["RANK"]["VALUE"])];
    }

//DEGREE
    $arSelect = Array("ID", "PROPERTY_TITLE", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => "6", "ID"=>$arResult["DEGREE"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $list = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);

    $res = array();
    $resDeg = array();

    while($ob = $list->GetNextElement()) {
        $arFields = $ob->GetFields();
        $res[$arFields["ID"]] = $arFields["PROPERTY_TITLE_VALUE"];
        $resDeg[$arFields["ID"]] = $arFields["DETAIL_PAGE_URL"];
    }

    for ($i = 0; $i < count($arResult["ITEMS"]); $i++){
        $arResult["ITEMS"][$i]["PROPERTIES"]["DEGREE_NAME"] = $res[intval($arResult["ITEMS"][$i]["PROPERTIES"]["DEGREE"]["VALUE"])];
        $arResult["ITEMS"][$i]["PROPERTIES"]["DEGREE_URL"] = $resDeg[intval($arResult["ITEMS"][$i]["PROPERTIES"]["DEGREE"]["VALUE"])];
    }


?>

