<!-- Block ns_monmodule -->
<div id="vm_gitcommit_block_home" class="block">
  <h4>{l s='Module Git Commit' d='Modules.Vm_GitCommit'}</h4>
  <div class="block_content">
    <a href="{$vm_page_link}">
           {if isset($vm_page_name) && $vm_page_name}
               {$vm_page_name}
               {if isset($error)}
                   <div>{$error}</div>
               {/if}
           {else}
               Votre lien
           {/if}
    </a>
  </div>
</div>
<!-- /Block ns_monmodule -->

