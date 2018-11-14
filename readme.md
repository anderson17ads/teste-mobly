# Teste Mobly

Este é um carrinho de compra realizado para empresa Mobly, o teste tem os seguintes recursos:

- Lista de Produtos
- Detalhe do Produto
- Carrinho de Compra
- Pedidos de Compra
- Pedidos de Compra
- Detalhes de Pedido
- Cancelamento de Pedido

## Informações

O banco de dados está na raiz do projeto com o nome de "teste-mobly.sql".

O projeto foi desenvolvido em "Laravel 5.4".

Desenvolvi o projeto usando containers do Docker, caso o cliente tenha o Docker instalado, só subir os containers com o seguinte comando:

sudo docker-compose up

Configurações

As configurações de banco de dados está no arquivo ".env" na pasta raiz.

Nesse arquivo tem uma constante chamada "DB_HOST", o valor dela está como "mysql", uso esse valor porque estou refenrenciando do container do Docker, caso o cliente não usar o Docker, só mudar para "127.0.0.1".