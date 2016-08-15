<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудники");
?>
<?
if(SITE_ID == s1) {
	title("Сотрудники", "Главная");
	$prop['FULL_NAME'] = "FULL_NAME";
	$prop['SURNAME'] = "SURNAME";
	$prop['NAME'] = "NAME";
	$prop['PATRONIM'] = "PATRONIM";
	$prop['DESCRIPTION'] = "DESCRIPTION";
	$prop['RANK_STRING'] = "Должность";
	$prop['RANK'] = "TITLE";
	$prop['DEGREE_STRING'] = "Ученая степень";
	$prop['DEGREE'] = "TITLE";
} else {
	title("Scientists", "Main");
	$prop['FULL_NAME'] = "FULL_NAME_EN";
	$prop['SURNAME'] = "SURNAME_EN";
	$prop['NAME'] = "NAME_EN";
	$prop['PATRONIM'] = "PATRONIM_EN";
	$prop['DESCRIPTION'] = "DESCRIPTION_EN";
	$prop['RANK_STRING'] = "Rank";
	$prop['RANK'] = "TITLE_EN";
	$prop['DEGREE_STRING'] = "Academic degree";
	$prop['DEGREE'] = "TITLE_EN";
}
?>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>5);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<div class=\"col-md-6 col-sm-12\">";
	echo "<div class=\"thumbnail container-fluid\">";
	echo "<img class=\"thumbnail\" src=", CFile::GetPath($arFields['PREVIEW_PICTURE']), ">";
	echo "<div class=\"scientist-det-group col-md-12\"><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['FULL_NAME']]['VALUE'], "</a></b><br>";
	$arFilterI = Array("IBLOCK_ID"=>7, "ID" => $arProp['RANK']['VALUE']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	while($obI = $resI->GetNextElement()) {
		$arPropI = $obI->GetProperties();
		$arFieldsI = $obI->GetFields();
		echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['RANK']]['VALUE'], "</a><br>";
	}
	$arFilterI = Array("IBLOCK_ID"=>6, "ID" => $arProp['DEGREE']['VALUE']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	while($obI = $resI->GetNextElement()) {
		$arPropI = $obI->GetProperties();
		$arFieldsI = $obI->GetFields();
		echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['DEGREE']]['VALUE'], "</a><br>";
	}
	//echo $arProp[$prop['SURNAME']]['NAME'], ": ", $arProp[$prop['SURNAME']]['VALUE'], "<br>";
	//echo $arProp[$prop['NAME']]['NAME'], ": ", $arProp[$prop['NAME']]['VALUE'], "<br>";
	//echo $arProp[$prop['PATRONIM']]['NAME'], ": ", $arProp[$prop['PATRONIM']]['VALUE'], "<br>";
	//echo $arProp[$prop['DESCRIPTION']]['NAME'], ": ", $arProp[$prop['DESCRIPTION']]['VALUE'], "<br>";

	echo "</div>";
    echo "<div class=\"col-md-12 text-justify\">";
    echo mb_strimwidth($arProp[$prop['DESCRIPTION']]['VALUE'],0,500, "...");
    echo "<div class='caption'><ul class=\"list-inline text-center\">
                    <li><a href=\"#\"><i class=\"fa fa-2x fa-facebook-square\"></i></a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-2x fa-linkedin-square\"></i></a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-2x fa-twitter-square\"></i></a>
                    </li>
                </ul></div>";
    echo "<a href=\"",$arFields["DETAIL_PAGE_URL"],"\" class=\"btn btn-primary sci-details\"><span class=\"glyphicon glyphicon-share-alt\"></span> Подробнее</a>";
    echo "</div>";
	echo "</div>";
	echo "</div>";
}
?>
<?
function getSize($block, $property, $id)
{
	return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<?
function title($authors, $main) {
	echo "	<div class=\"row\">
		<div class=\"col-lg-12\">
			<h1 class=\"page-header\">",
	$authors,
	"</h1>
			<ol class=\"breadcrumb\">
				<li><a href=",SITE_DIR, ">", $main, "</a></li>
				<li class=\"active\">", $authors, "</li>
			</ol>
		</div>
	</div>";
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>