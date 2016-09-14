<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
if(SITE_ID == s1) {
    $prop['TITLE'] = "TITLE";
    $prop['HEAD'] = "Публикация";
    $prop['HEAD_SMALL'] = "отдела";
    $prop['MAIN'] = "Главная";
    $prop['TYPE'] = "Публикации";
    $prop['ANNOTATION'] = "ANNOTATION";
    $prop['BIBLIODATA'] = "BIBLIODATA";
    $prop['AUTHOR_STR'] = "Авторы";
    $prop['FULL_NAME'] = "FULL_NAME";
    $prop['PUBLTYPE_STR'] = "Тип публикации";
    $prop['JOURNAL'] = "Издание";
    $prop['IS_OMI_STR'] = "Выполнено в ОМИ";
    $prop['FULL_TEXT'] = "Полный текст";
    $prop['UDK'] = "Код UDK";
    $prop['KEYWORDS'] = "Ключевые слова";
    $prop['PUBL_DATE'] = "Дата издания";

} else {
    $prop['TITLE'] = "TITLE_EN";
    $prop['HEAD'] = "Publication";
    $prop['HEAD_SMALL'] = "of OMI's scientists";
    $prop['MAIN'] = "Main";
    $prop['TYPE'] = "Publications";
    $prop['ANNOTATION'] = "ENANNOTATION";
    $prop['BIBLIODATA'] = "BIBLIODATAEN";
    $prop['AUTHOR_STR'] = "Authors";
    $prop['FULL_NAME'] = "FULL_NAME_EN";
    $prop['PUBLTYPE_STR'] = "Publication type";
    $prop['JOURNAL'] = "Journal";
    $prop['IS_OMI_STR'] = "Made in OMI";
    $prop['FULL_TEXT'] = "Full text";
    $prop['UDK'] = "UDK code";
    $prop['KEYWORDS'] = "Keywords";
    $prop['PUBL_DATE'] = "Publication date";
}
?>
<?
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(9, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
$APPLICATION->SetTitle($detail);
while($ob = $res->GetNextElement())
{
    $arProp = $ob->GetProperties();
    $detail = $arProp[$prop['TITLE']]['VALUE'];
}
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?echo $prop['HEAD'];?>
                <small><?echo $prop['HEAD_SMALL']?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=<?echo SITE_DIR;?>><?echo $prop['MAIN']?></a></li>
                <li class="active"><a href="<?echo SITE_DIR;?>publications/"><?echo $prop['TYPE']?></a></li>
                <li class="active"><?echo $detail;?></li>
            </ol>

        </div>
    </div>
<?$APPLICATION->IncludeComponent("bitrix:news.detail", "publdetail", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],	// Код новости
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],	// ID новости
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "9",	// Код информационного блока
		"IBLOCK_TYPE" => "biblio",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Страница",	// Название категорий
		"PROPERTY_CODE" => array(	// Свойства
			0 => $prop["TITLE"],
			1 => $prop["ANNOTATION"],
			2 => $prop["BIBLIODATA"],
		),
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"USE_SHARE" => "N",	// Отображать панель соц. закладок
	),
	false
);
//test_dump(getCurrentID(9, $_REQUEST["ELEMENT_CODE"]));
?>
<?/*
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => getCurrentID(9, $_REQUEST["ELEMENT_CODE"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arProp = $ob->GetProperties();
	echo $prop['AUTHOR_STR'], ": ";
    foreach ($arProp['AUTHORS']['VALUE'] as $item) {
        $arFilter = Array("IBLOCK_ID" => 12, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $item);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);
        while ($ob1 = $res->GetNextElement()) {
            $arFields1 = $ob1->GetFields();
            $arProp1 = $ob1->GetProperties();
            echo "<a href=", $arFields1['DETAIL_PAGE_URL'], ">", $arProp1[$prop['FULL_NAME']]['VALUE'], "</a> ";
        }
    }
    if($arProp['PUBLTYPE']['VALUE'] != null) {
        echo "<br>";
        $arFilter = Array("IBLOCK_ID" => 10, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arProp['PUBLTYPE']['VALUE']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);
        while ($ob2 = $res->GetNextElement()) {
            $arFields2 = $ob2->GetFields();
            $arProp2 = $ob2->GetProperties();
            echo $prop['PUBLTYPE_STR'], ": <a href=", $arFields2['DETAIL_PAGE_URL'], ">", $arProp2[$prop['TITLE']]['VALUE'], "</a>";
        }
    }
    if($arProp['JOURNAL']['VALUE'] != null) {
        echo "<br>";
        $arFilter = Array("IBLOCK_ID" => 11, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arProp['JOURNAL']['VALUE']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 10), $arSelect);
        while ($ob3 = $res->GetNextElement()) {
            $arFields3 = $ob3->GetFields();
            $arProp3 = $ob3->GetProperties();
            echo $prop['JOURNAL'], ": <a href=", $arFields3['DETAIL_PAGE_URL'], ">", $arProp3[$prop['TITLE']]['VALUE'], "</a>";
        }
    }
    if($arProp['isOMI']['VALUE'] != null) {
        echo "<br>";
        echo $prop['IS_OMI_STR'], ": ", $arProp['isOMI']['VALUE'];
    }
    if($arProp['FULLTEXT']['VALUE'] != null) {
        echo "<br>";
        echo "<a href=", $arProp['FULLTEXT']['VALUE'], ">", $prop['FULL_TEXT'], "</a>";
    }
    if($arProp['UDK']['VALUE'] != null) {
        echo "<br>";
        echo $prop['UDK'], ": ", $arProp['UDK']['VALUE'];
    }
    foreach ($arProp['KEYWORDS']['VALUE'] as $item) {
        echo $prop['KEYWORDS'], ": ", $item;
    }
    if($arProp['PUBLDATE']['VALUE'] != null) {
        echo "<br>";
        echo $prop['PUBL_DATE'], ": ", $arProp['PUBLDATE']['VALUE'];
    }
}
*/?>
<?
function getCurrentID($iblock_id, $code)
{
    if(CModule::IncludeModule("iblock"))
    {
        $arFilter = array("IBLOCK_ID"=>$iblock_id, "CODE" => $code);
        $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>1), array('ID'));
        $element = $res->Fetch();
        if($res->SelectedRowsCount() != 1) return '<p>Элемент не найден</p>';
        else return $element['ID'];
    }
}
?>
<?
function getSize($block, $property, $id)
{
    return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>