<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Типы публикаций");
?>
<?
if(SITE_ID == s1) {
	$prop['HEAD'] = "Тип";
	$prop['HEAD_SMALL'] = "Публикаций";
	$prop['MAIN'] = "Главная";
	$prop['TITLE'] = "TITLE";
	$prop['PUB_LIST'] = "Публикации";
} else {
	$prop['HEAD'] = "Type";
	$prop['HEAD_SMALL'] = "of publications";
	$prop['MAIN'] = "Main";
	$prop['TITLE'] = "TITLE_EN";
	$prop['PUB_LIST'] = "Publications";
}
?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<?echo $prop['HEAD'];?>
				<small><?echo $prop['HEAD_SMALL'];?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href=<?echo SITE_DIR;?>><?echo $prop['MAIN'];?></a></li>
				<li class="active"><?echo $prop['HEAD'], " " , $prop['HEAD_SMALL'];?></li>
			</ol>
		</div>
	</div>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>10);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<p><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a></b><br>";
	$arFilterI = Array("IBLOCK_ID"=>9, "PROPERTY_PUBLTYPE" => $arFields['ID']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>5));
	if (getSize(9, "PROPERTY_PUBLTYPE", $arFields['ID']) != 0) {
		echo $prop['PUB_LIST'], ":<br>";
		while($obI = $resI->GetNextElement()) {
			$arPropI = $obI->GetProperties();
			$arFieldsI = $obI->GetFields();
			echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['TITLE']]['VALUE'], "</a></br>";
		}
	}
	echo $resI->NavPrint($prop['PUB_LIST']);
	echo "</p>";
}
?>
<?
function getSize($block, $property, $id)
{
	return CIBlockElement::GetList(array(), array('IBLOCK_ID' => $block, $property => $id), array(), false, array('ID', 'NAME'));
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>