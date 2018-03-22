<nav aria-label="Page navigation">
  <ul class="pagination pagination-sm">
    <li class="disabled">
      <a href="#">
        (<?=($this->NavPageNomer-1)*$this->NavPageSize+1?>
        -
        <?if($this->NavPageNomer != $this->NavPageCount):?>
          <?=$this->NavPageNomer * $this->NavPageSize?>
        <?else:?>
          <?=$this->NavRecordCount?>
        <?endif;?>
        <?=GetMessage("nav_of")?>
        <?=$this->NavRecordCount?>)
      </a>
    </li>
    <?if($this->NavPageNomer > 1):?>
      <li>
        <a href="<?=$sUrlPath?>?PAGEN_<?=$this->NavNum?>=1<?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$sBegin?></a>
      </li>
      <li>
        <a href="<?=$sUrlPath?>?PAGEN_<?=$this->NavNum?>=<?=($this->NavPageNomer-1)?><?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$sPrev?></a>
      </li>
    <?else:?>
      <li class="disabled">
        <a href="#"><?=$sBegin?></a>
      </li>
      <li class="disabled">
        <a href="#"><?=$sPrev?></a>
      </li>
    <?endif;?>
    <?$NavRecordGroup = $nStartPage;?>
    <?while($NavRecordGroup <= $nEndPage):?>
      <?if($NavRecordGroup == $this->NavPageNomer):?>
        <li class="active">
          <a href="#"><?=$NavRecordGroup?></a>
        </li>
      <?else:?>
        <li><a href="<?=$sUrlPath?>?PAGEN_<?=$this->NavNum?>=<?=$NavRecordGroup?><?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$NavRecordGroup?></a></li>
      <?endif;?>
      <?$NavRecordGroup++;?>
    <?endwhile;?>
    <?if($this->NavPageNomer < $this->NavPageCount):?>
      <li>
        <a href="<?=$sUrlPath?>?PAGEN_<?=$this->NavNum?>=<?=($this->NavPageNomer+1)?><?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$sNext?></a>
      </li>
      <li>
        <a href="<?=$sUrlPath?>?PAGEN_<?=$this->NavNum?>=<?=$this->NavPageCount?><?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$sEnd?></a>
      </li>
    <?else:?>
      <li class="disabled">
        <a href="#"><?=$sNext?></a>
      </li>
      <li class="disabled">
        <a href="#"><?=$sEnd?></a>
      </li>
    <?endif;?>
    <?if($this->bShowAll):?>
      <?if($this->NavShowAll):?>
        <li><a href="<?=$sUrlPath?>?SHOWALL_<?=$this->NavNum?>=0<?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$sPaged?></a></li>
      <?else:?>
        <li><a href="<?=$sUrlPath?>?SHOWALL_<?=$this->NavNum?>=1<?=$strNavQueryString?>#nav_start<?=$add_anchor?>"><?=$sAll?></a></li>
      <?endif;?>
    <?endif;?>
  </ul>
</nav>