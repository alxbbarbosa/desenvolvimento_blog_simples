# Blog em Laravel [Working progress]

É um blog construído com Laravel, com panel de administração e layout fixo

## Getting Started

Criação de blog utilizando o laravel

### Prerequisites

Você precisa ter instalado PHP e MySQL Server, além disso você deve ativar o módulo de Rewrite do seu servidor web. Se estiver utilizando Linux, muitas vezes o LAMP lhe apresentará todo ambiente perfeito. No Windows, muitos costumam utilizar o XAMP que também contém um servidor web apache.
Não faz parte desde documento, apresentar as etapas de instalação de cada elemento do ambiente de execução.

### Installing

Após baixar o código, se estiver compactado, extrai-os e coloque-os no diretório que pode ser lido por um servidor web ou em um diretório de sua preferencia para rodar com o servidor web embutido no php que pode ser invocado pelo artisan.

Logo em seguida, você deve executar o composer para instalação das dependências:

```

composer install

npm install

```
 
Você precisa configurar o arquivo .env informando os detalhes de conexão com banco de dados. Além disso ainda no arquivo .env, precisa configurar o QUEUE_CONNECTION=database
Também precisa definir as configurações de email, para que o fluxo de mensagens possa ocorrer. Para configuração de servidor de email, pode-se utilizar o Mailtrap.io

Uma vez configurado o arquivo .env. Execute os comandos:

```

php artisan key:generate

php artisan migrate --seed

```

Para executar o programa, se não estiver utizando um servidor web, inicie o servidor web embutido, utilizando o comando:

```
php artisan serve

```


### Usage

Usuario: admin@myblog.com.br
Senha: 12345678


## Authors

* **Alexandre Bezerra Barbosa**
