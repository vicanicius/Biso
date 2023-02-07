## Dependências

- Docker

### Execute os seguintes passos separadamente no seu terminal dentro da pasta do projeto:

Levante a aplicação com docker.

`docker-compose up --build -d`

O ambiente pode ser acessado no http://localhost:8000

## Instrução de uso

Utilizar a collection de Postman na raiz do projeto para obter a rota, e adicionar o arquivo fornecido para teste na pasta arquivos do projeto.

## Explicação da solução

O maior problema é adequar as matrizes em ordem crescente, quando se faz necessário, então resolvi utilizar o método sort(), nativo do php, acredito ser a mais adequada pois evia criação de código para fazer tal função, e pensando em escalabilidade da "api", o método está pronto para receber multiplos arquivos.