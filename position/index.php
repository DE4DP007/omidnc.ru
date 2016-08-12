<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Должность");
?>
<?
if(SITE_ID == s1) {
	$prop["MAIN"] = "Главная";
	$prop["POSITIONS"] = "Должности";
	$prop['HEAD_SMALL'] = "сотрудников";
	$prop["TITLE"] = "TITLE";
	$prop["SHORT_TITLE"] = "SHORT_TITLE";
	$prop['SCI_LIST'] = "Список сотрудников";
	$prop['FULL_NAME'] = "FULL_NAME";
} else {
	$prop["MAIN"] = "Main";
	$prop["POSITIONS"] = "Positions";
	$prop['HEAD_SMALL'] = "of scientists";
	$prop["TITLE"] = "TITLE_EN";
	$prop["SHORT_TITLE"] = "SHORT_TITLE_EN";
	$prop['SCI_LIST'] = "Scientists list";
	$prop['FULL_NAME'] = "FULL_NAME_EN";
}
?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<?echo $prop['POSITIONS'];?>
				<small><?echo $prop['HEAD_SMALL'];?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href=<?echo SITE_DIR;?>><?echo $prop['MAIN'];?></a></li>
				<li class="active"><?echo $prop['POSITIONS'];?></li>
			</ol>

		</div>
	</div>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>7);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<p><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a></b><br>";
	if($arProp[$prop['SHORT_TITLE']]['VALUE'])
		echo $arProp[$prop['SHORT_TITLE']]['NAME'], ": ", $arProp[$prop['SHORT_TITLE']]['VALUE'], "<br>";
	$arFilterI = Array("IBLOCK_ID"=>5, "PROPERTY_RANK" => $arFields['ID']);
	$resI = CIBlockElement::GetList(Array(), $arFilterI, false, Array("nPageSize"=>10));
	if(getSize(5, "PROPERTY_RANK", $arFields['ID']) != 0)
	{
		echo $prop['SCI_LIST'], ":<br>";
		while($obI = $resI->GetNextElement()) {
			$arPropI = $obI->GetProperties();
			$arFieldsI = $obI->GetFields();
			echo "<a href=", $arFieldsI['DETAIL_PAGE_URL'], ">", $arPropI[$prop['FULL_NAME']]['VALUE'], "</a><br>";
		}
	}
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