<section>
    <h1>Témoingnages</h1>
   

        {foreach from=$testimonies item=testimony}
            <div class="col-md-4 ">
                <div class="testimonies">
                    <img src="{$testimony_path}{$testimony.id_testimony}.jpg"  width="100%" height="250px">
                    <h3>{$testimony.name}</h3>
                    <p>{$testimony.description}</p> 
                </div>
            </div>
       {/foreach}
  
</section>