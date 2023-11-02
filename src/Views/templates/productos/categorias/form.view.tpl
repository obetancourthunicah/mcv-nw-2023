<section class="depth-2 py-4 px-4">
<h1>{{modedsc}}</h1>
</section>
{{with categoria}}
<form class="my-4 depth-2 py-4 px-4 row" action="index.php?page=Productos-Categorias-CategoriaForm&mode={{~mode}}&id={{id}}" method="POST">
    <input type="hidden" name="xss-token" value="{{~xss_token}}"/>
    <section class="col-6 offset-3">
    <section class="row my-2 align-center">
    <label class="col-4" for="id">Código</label>
    <input class="col-8" type="text" name="id" id="id" value="{{id}}" readonly />
    </section>
    <section class="row my-2 align-center">
    <label class="col-4" for="name">Categoría</label>
    <input class="col-8" type="text" id="name" name="name" placeholder="Nombre de la Categoría"
        value="{{name}}" {{~readonly}}/>
    {{if name_error}}<div class="error">{{name_error}}</div>{{endif name_error}}
    </section>
    <section class="row my-2 align-center">
    <label class="col-4" for="status">Estado</label>
    <select class="col-8" id="status" name="status"
        {{if ~readonly}}disabled readonly{{endif ~readonly}}
    >
        <option value="ACT" {{ACT_selected}}>Activo</option>
        <option value="INA" {{INA_selected}}>Inactivo</option>
    </select>
    {{if status_error}}<div class="error">{{status_error}}</div>{{endif status_error}}
    </section>
    <br/>
    <section class="col-12 right">
    {{if ~showConfirm}}
        <button type="submit" name="btnConfirm">Confirmar</button>&nbsp;
    {{endif ~showConfirm}}
    <button id="btnCancel">Cancelar</button>
    </section>
    </section>
</form>
{{endwith categoria}}
<script>
    document.addEventListener("DOMContentLoaded", ()=>{
        document.getElementById("btnCancel").addEventListener("click", (e)=>{
            e.preventDefault();
            e.stopPropagation();
            document.location.assign("index.php?page=Productos-Categorias-CategoriasList");
        });
    });
</script>