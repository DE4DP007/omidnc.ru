<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Журналы");
?>
<?
if(SITE_ID == s1) {
	$prop['HEAD'] = "Список";
	$prop['HEAD_SMALL'] = "изданий";
	$prop['MAIN'] = "Главная";
	$prop['JOURNALS'] = "Издания";
	$prop['TITLE'] = "TITLE";
	$prop['DESCRIPTION'] = "DESCRIPTION";
	$prop['PUBL_STR'] = "Статьи";
} else {
	$prop['HEAD'] = "List";
	$prop['HEAD_SMALL'] = "of journals";
	$prop['MAIN'] = "Main";
	$prop['JOURNALS'] = "Journals";
	$prop['TITLE'] = "TITLE_EN";
	$prop['DESCRIPTION'] = "DESCRIPTION_EN";
	$prop['PUBL_STR'] = "Publications";
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
			<li class="active"><?echo $prop['JOURNALS'];?></li>
		</ol>
	</div>
</div>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>11);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProp = $ob->GetProperties();
	echo "<p><b>", "<a href='", $arFields["DETAIL_PAGE_URL"], "'>", $arProp[$prop['TITLE']]['VALUE'], "</a></b><br>";
	if(CFile::GetPath($arFields['PREVIEW_PICTURE']) != null) {
		echo "<img src=", CFile::GetPath($arFields['PREVIEW_PICTURE']), "><br>";
	}
	if($arProp[$prop["DESCRIPTION"]]["VALUE"] != null){
		echo $arProp[$prop['DESCRIPTION']]['NAME'], ": ", $arProp[$prop['DESCRIPTION']]['VALUE'], "<br>";
	}
	if(getSize(9, "PROPERTY_JOURNAL", $arFields['ID']) != 0) {
		$arFilter1 = Array("IBLOCK_ID"=>9, "PROPERTY_JOURNAL"=>$arFields['ID']);
		$res1 = CIBlockElement::GetList(Array(), $arFilter1, false, Array("nPageSize"=>10), $arSelect);
		echo $prop['PUBL_STR'], ":<br>";
		while ($ob1 = $res1->GetNextElement()) {
			$arFields1 = $ob1->GetFields();
			$arProp1 = $ob1->GetProperties();
			echo "<a href='", $arFields1["DETAIL_PAGE_URL"], "'>", $arProp1[$prop['TITLE']]['VALUE'], "<br>";
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
<?
$arFilter = array('IBLOCK_ID' => 11);
$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID'));
if ($el = $res->Fetch())
	echo 'Количество изданий: '.$el['CNT'];?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>