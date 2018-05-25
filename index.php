<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отдел Математики и Информатики ДНЦ РАН");?>


    <!-- Marketing Icons Section -->
    <div class="row" id="nirnapr">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/mainhead1.php",
                    Array(),
                    Array("MODE"=>"text")
                );?>
            </h1>
        </div>
        <div class="col-lg-12">
            <p  class="text-justify">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/maintext1.php",
                    Array(),
                    Array("MODE"=>"html")
                );?>
            </p>
        </div>

        <div class="col-md-4">
            <div class="same-height omi-card no-padding panel-default">
                <div class="card-title panel-heading">
                    <h4>
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/mainhead1.1.php",
                            Array(),
                            Array("MODE"=>"html")
                        );?>
                    </h4>
                </div>
                <div class="panel-body text-right">
                    <p class="text-justify">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/maintext1.1.php",
                            Array(),
                            Array("MODE"=>"text")
                        );?>
                    </p>
                    <!--<br><a href="#" class="btn btn-default">Подробнее</a>-->
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="omi-card no-padding panel-default same-height">
                <div class="card-title panel-heading">
                    <h4>
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/mainhead1.2.php",
                            Array(),
                            Array("MODE"=>"html")
                        );?>
                    </h4>
                </div>
                <div class="panel-body text-right">
                    <p class="text-justify">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/maintext1.2.php",
                            Array(),
                            Array("MODE"=>"text")
                        );?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="omi-card no-padding panel-default same-height">
                <div class="card-title panel-heading">
                    <h4>
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/mainhead1.3.php",
                            Array(),
                            Array("MODE"=>"html")
                        );?>
                    </h4>
                </div>
                <div class="panel-body text-right">
                    <p class="text-justify">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/maintext1.3.php",
                            Array(),
                            Array("MODE"=>"text")
                        );?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/mainhead2.php",
                    Array(),
                    Array("MODE"=>"text")
                );?>
            </h2>
        </div>
        <div class="col-md-6">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/maintext2.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </div>
        <div class="col-md-6">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/maintext2photo.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </div>

        <div class="col-md-12">
            <p class="text-justify">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/maintext2.1.php",
                    Array(),
                    Array("MODE"=>"html")
                );?>
            </p>
        </div>

    </div>
    <!-- /.row -->



    <!-- Team Members -->
    <!-- <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/mainhead3.php",
                    Array(),
                    Array("MODE"=>"text")
                );?>
            </h2>
        </div> -->

    <div class="col-lg-12">
        <h2 class="page-header">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/mainhead3.php",
                Array(),
                Array("MODE"=>"text")
            );?>
        </h2>
    </div>

    <?$APPLICATION->IncludeComponent("bitrix:news.list", "scientist_list_indx", Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
        "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",	// Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "A",	// Тип кеширования
        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
        "COMPONENT_TEMPLATE" => "scientistlist",
        "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
        "DISPLAY_DATE" => "Y",	// Выводить дату элемента
        "DISPLAY_NAME" => "Y",	// Выводить название элемента
        "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
        "FIELD_CODE" => array(	// Поля
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",	// Фильтр
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "5",	// Код информационного блока
        "IBLOCK_TYPE" => "news",	// Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
        "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "20",	// Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
        "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
        "PAGER_TITLE" => "Сотрудники",	// Название категорий
        "PARENT_SECTION" => "",	// ID раздела
        "PARENT_SECTION_CODE" => "",	// Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(	// Свойства
            0 => "NAME",
            1 => "PATRONIM",
            2 => "SURNAME",
            3 => "RANK",
            4 => "DEGREE",
            5 => "",
        ),
        "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
        "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "N",	// Устанавливать статус 404
        "SET_TITLE" => "N",	// Устанавливать заголовок страницы
        "SHOW_404" => "N",	// Показ специальной страницы
        "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
        "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
        "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
        "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
        ),
        false
    );?>
    <!-- </div> -->


    <script type="text/javascript">
        $(document).ready(function() {
            equalizeHeights(".same-height");
        });
    </script>



    <!-- Portfolio Section -->
    <?/*
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/mainhead3.php",
                    Array(),
                    Array("MODE"=>"text")
                );?>
            </h2>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
    </div>*/?>
    <!-- /.row -->
<?/*
<p>
Наша компания существует на Российском рынке с 1992 года. За это время «Мебельная компания» прошла большой путь от маленькой торговой фирмы до одного из крупнейших производителей корпусной мебели в России.
</p><p>
«Мебельная компания» осуществляет производство мебели на высококлассном оборудовании с применением минимальной доли ручного труда, что позволяет обеспечить высокое качество нашей продукции. Налажен производственный процесс как массового и индивидуального характера, что с одной стороны позволяет обеспечить постоянную номенклатуру изделий и индивидуальный подход – с другой.
<h3>Наша продукция</h3>
<?$APPLICATION->IncludeComponent("bitrix:furniture.catalog.index", "", array(
	"IBLOCK_TYPE" => "products",
	"IBLOCK_ID" => "2",
	"IBLOCK_BINDING" => "section",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N"
	),
	false
);?>
<h3>Наши услуги</h3>
<?$APPLICATION->IncludeComponent("bitrix:furniture.catalog.index", "", array(
	"IBLOCK_TYPE" => "products",
	"IBLOCK_ID" => "3",
	"IBLOCK_BINDING" => "element",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N"
	),
	false
);?>
</p>

*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>