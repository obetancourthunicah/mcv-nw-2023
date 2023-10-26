<h1>{{modedsc}}</h1>
{{with categoria}}
<form action="index.php?page=Productos-Categorias-CategoriaForm&mode={{~mode}}&id={{id}}" method="POST">
    <label for="id">Código</label>
    <input type="text" name="id" id="id" value="{{id}}" readonly />
    <br>
    <label for="name">Categoría</label>
    <input type="text" id="name" name="name" placeholder="Nombre de la Categoría"
        value="{{name}}" />
    {{if name_error}}<div class="error">{{name_error}}</div>{{endif name_error}}
    <br>
    <label for="status">Estado</label>
    <select id="status" name="status">
        <option value="ACT" {{ACT_selected}}>Activo</option>
        <option value="INA" {{INA_selected}}>Inactivo</option>
    </select>
    {{if status_error}}<div class="error">{{status_error}}</div>{{endif status_error}}
    <br>
    <button type="submit" name="btnConfirm">Confirmar</button>
    <button id="btnCancel">Cancelar</button>
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