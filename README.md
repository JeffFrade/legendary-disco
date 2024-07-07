# API Backend

### Estrutura da Aplicação
---

A aplicação foi desenvolvida para executar em ambiente com `Docker` com os seguintes containers:

- `PHP`: Esse container fica com a parte do `PHP` (Versão `8.2 fpm`), `Composer` (Gerenciador de pacotes do `PHP`, utilizando a versão `2`) e suas extensões.
- `nginx`: Esse container é responsável pelo servidor web no qual servirá a aplicação (`nginx` versão `1.16`)
- `MySQL`: Esse container fica o banco de dados com a parte mais gerencial do sistema, como usuários, sensores, configurações dos sensores e etc (Utiliza a versão `8`).

### Primeira configuração
---

Para configurar a aplicação para o primeiro uso, basta rodar o script `config.sh` na raiz do projeto:
```bash
$ sh config.sh
```

** Obs: Caso queira trocar a porta na qual a aplicação será servida, basta trocar o valor da variável `DOCKER_NGINX_PORT` no `.env` que será gerado pelo `config.sh`.

### Rodando a aplicação após configurar
---

Basta subir os containers do `Docker`com:
```bash
$ docker-compose up -d
```
