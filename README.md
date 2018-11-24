# Site para o projeto de TGI da Faculdade Drummond

Site fictício de filmes para o projeto de TGI da Universidade Drummond

O site conta com algumas funcionalidades:
-Painel administrativo para quem ter permissao no banco de dados.
 Para setar algum usuário como administrador do site, terá que setar um valor booleano (1) no atributo admin da tabela "cadastro" no banco de dados.  Caso o usuário não for admin do site, valor (0), o link para o painel administrativo não aparecerá.
-Todo cadastro realizado no site irá setar o valor booleano (0) no cadastro do usuário.
-Para o usuário poder ter acesso ao site, o mesmo terá que conter o cadastro no site. Caso ele tente acessar outras paginas do site, não ira permitir e irá redirecionar para a pagina de login.
-Todos os campos do cadastro devem estar devidamente preenchidos para se cadastrar, caso o usuário tente se cadastrar faltando um campo, não irá permitir.
-O usuário que obter a permissao de administrador do site, irá poder editar, excluir e adicionar filmes ao site.
-Cada usuário do site poderá alterar os seus dados ou excluir sua conta no site.
-A alteração de dados somente poderá ser realizada nos atributos nome, sobrenome e email.

#plus
-Quando o usuário for se cadastrar no site, irá escolher o seu sexo. Na pagina de boas vindas do site, irá aparecer o "bem vindo" de acordo com o seu sexo.
 Caso o usuário se cadastrar como sexo Masculino, "bem vindo". Caso feminino, "bem vinda". Caso indefinido, "bem vindx".

-Para adaptar o site a seu banco de dados, edite o arquivo "conectaBanco.php".
