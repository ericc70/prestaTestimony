{extends file='page.tpl'}

{block name="page_title"}
     <span>Témoingnages</span>
{/block}

{block name="page_content_container"}
<section>
      
        {foreach from=$testimonies item=testimony}
            <div class="col-md-4 ">
                <div class="testimonies">
                    <img src="{$testimony_path}{$testimony.id_testimony}.jpg"  width="100%" height="250px">
                    <h3>{$testimony.name}</h3>
                    <p>{$testimony.description nofilter}</p> 
                </div>
            </div>
       {/foreach}
  
       <div class="pagination">
       {foreach from=range(1, $total_pages) item=page}
           <a href="?p={$page}" class="{if $page == $current_page}active{/if}">{$page}</a>
       {/foreach}
   </div>
   
   
</section>
    {/block}