<h1>Versiones del Sistema</h1>
{{if hasVersionRows}}
<table class="table table-striped">
    <thead>
        <tr>
            <th>Version</th>
            <th>Fecha</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        {{foreach versions}}
        <tr>
            <td>{{version}}</td>
            <td>{{description}}</td>
            <td>{{created_at}}</td>
        </tr>
        {{endfor versions}}
    </tbody>
</table>
{{endif hasVersionRows}}