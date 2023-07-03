<div x-data='{open:false}' w @flash-message.windo= 'open=true ; setTimeout(()=>open=false,7000);'>
    <div x-show="open" x-cloak>
       <div class="alert alert-danger">
        {{$message}}
       </div>
    </div>
</div>
