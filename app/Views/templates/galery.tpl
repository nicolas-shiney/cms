{extends file="layout.tpl"}

{block name="content"}
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>Welcome, {$username|default:'Guest'}!</h1>
            <p>{$content}</p>
        </div>
    </div>
{/block}
