


<section>
    <h1>Témoingnages</h1>
   

        {foreach from=$testimonies item=testimony}
            <div class="col-md-4 ">
                <div class="testimonies">
                    <img src="{$testimony_path}{$testimony.id_testimony}.jpg"  width="100%" height="250px">
                    <h3>{$testimony.name}</h3>
                    <p>{$testimony.description nofilter}</p> 
                </div>
            </div>
       {/foreach}
  
       <a href="{$link->getModuleLink('testimony' , 'testimonies') }" class="btn btn-default"> Voir</a>
</section>