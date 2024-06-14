<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        /* permite a quebra da pagina ao aplicar esta classe css*/
        .page-break {
            page-break-after: always;
        }

        /* configuração da pagina */
        .titulo {
            border: 1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        table th {
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="titulo">Lista de tarefas</div>

    <table style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefa</th>
                <th>Data limite conclusão</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tarefas as $key => $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>
        <h2>Página 2</h2>

        <div class="page-break"></div>
        <h2>Página 3</h2>

        <div class="page-break"></div>
        <h2>Página 4</h2>
</body>

</html>
