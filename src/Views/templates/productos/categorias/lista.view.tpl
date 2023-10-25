<section>
    <h2>Listado de Categorias</h2>
</section>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Status</th>
                <th><a href="index.php?page=Productos-Categorias-CategoriaForm&mode=INS">Nuevo</a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach categorias}}
            <tr>
                <td>{{id}}</td>
                <td><a href="index.php?page=Productos-Categorias-CategoriaForm&mode=DSP&id={{id}}">{{name}}</a></td>
                <td>{{status}}</td>
                <td>
                    <a href="index.php?page=Productos-Categorias-CategoriaForm&mode=UPD&id={{id}}">Editar</a> 
                    | 
                    <a href="index.php?page=Productos-Categorias-CategoriaForm&mode=DEL&id={{id}}">Eliminar</a>
                </td>
            </tr>
            {{endfor categorias}}
        </tbody>
    </table>
</section>