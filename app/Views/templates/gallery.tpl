{extends file="layout.tpl"}

{block name="content"}
    <div class="row">
        <div class="col">
            <h1>Welcome, <span class="text-success">{$username|default:'Guest'}</span> on the <span class="text-primary">{$smarty.get.page}</span>!</h1>
            <p>{$content}</p>
        </div>
    </div>
{/block}
