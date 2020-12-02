{extends file='page.tpl'}  
 
{block name="page_content"}
    
    <ol reversed> {*html attribute to reverse the numeration of list*}
        {if !empty(gitCommits) &&  $gitCommits>2}
            {foreach from=$gitCommits item=gitCommit}
                <li class="commit">
                    <ul>
                        <li>
                            Commiter: {$gitCommit->commit->author->name} {*show author of commits*}
                        </li>
                        <li>
                            date: {$gitCommit->commit->author->date}
                        </li>
                        <li>
                            message: {$gitCommit->commit->message}
                        </li>
                    </ul>    
                </li>
            {/foreach}
        {else}
            <span>donnée manquante pour affichage</span>
            {$gitCommits|@var_dump}        
        {/if}
    </ol>
{/block}
