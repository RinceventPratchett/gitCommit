{extends file='page.tpl'}  
 
{block name="page_content"}
    
    <ul>
        {if !empty(gitCommits) &&  $gitCommits>2}
            {foreach from=$gitCommits item=gitCommit}
                <li>
                    {$gitCommit->commit->author->name} {*show author of commits*}
                </li>
                <li>
                    {$gitCommit->commit->author->date}
                </li>
                <li>
                    {$gitCommit->commit->message}
                </li>
            {/foreach}
        {else}
            <span>donnée manquante pour affichage</span>
            {$gitCommits|@var_dump}        
        {/if}
    </ul>
{/block}
