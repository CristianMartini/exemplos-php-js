<!DOCTYPE html>
<html>
    <head>
        <title>AJAX - Asynchronous Javascript and XML</title>
        <script async>
            function popular(dados) {
                let tabela = ""
                    + "<table>"
                    + '    <tr>'
                    + '        <th scope="column">Chave</th>'
                    + '        <th scope="column">Cor</th>'
                    + '        <th scope="column">Espécie</th>'
                    + '        <th scope="column">Localização</th>'
                    + '        <th scope="column">Folhas</th>'
                    + '        <th scope="column">Tipo</th>'
                    + '        <th scope="column"></th>'
                    + '        <th scope="column"></th>'
                    + '    </tr>';
                for (const linha of dados.listagem) {
                    tabela += `<tr>`
                        + `    <td>${linha.chave}</td>`
                        + `    <td>${linha.cor}</td>`
                        + `    <td>${linha.especie}</td>`
                        + `    <td>${linha.localizacao}</td>`
                        + `    <td>${linha.folhas}</td>`
                        + `    <td>${linha.tipo}</td>`
                        + `    <td>`
                        + `        <button type="button">`
                        + `            <a href="cadastro.php?chave=${linha.chave}">Editar</a>`
                        + `        </button>`
                        + `    </td>`
                        + `</tr>`;
                }
                document.getElementById("listagem").innerHTML = tabela;
            }

            function lerDados() {
                fetch("http://localhost/flores3/listagem-json.php")
                    .then(resposta => resposta.text())
                    .then(dados => popular(JSON.parse(dados)))
                    .catch(erro => {
                        console.log("Deu chabu", erro);
                    });
            }
        </script>
    </head>
    <body>
        <p>A listagem é ...</p>
        <div id="listagem"></div>
        <button type="button" onclick="lerDados()">Ler o resultado</button>
    </body>
</html>