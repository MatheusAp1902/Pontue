Para iniciarmos o processo de construção do projeto CRUD feito em php laravel, começamos instalando o XAMPP e o VScode dentro da
nossa máquina. Os passos de instalação do PHP/XAMPP foram feitos da seguinte forma:

Para a instalação do PHP no Windows, seguimos os passos abaixo:

Usando XAMPP (Pacote de Servidor Web):
Baixe o XAMPP:

Vá para https://www.apachefriends.org/index.html.
Baixe a versão mais recente do XAMPP para Windows.
Instale o XAMPP:

Execute o instalador que você baixou.
Durante a instalação, você pode escolher quais componentes instalar. Certifique-se de selecionar o PHP.
Inicie o Servidor Apache:

Após a instalação, abra o painel de controle do XAMPP.
Inicie o módulo Apache.
Teste a Instalação:

Abra um navegador e vá para http://localhost. Se tudo estiver configurado corretamente, você verá a página inicial do XAMPP.

Para instalar o Visual Studio Code no Windows, siga os passos abaixo:

Baixar o Visual Studio Code:

Acesse o site oficial do Visual Studio Code em https://code.visualstudio.com/.
Clique no botão "Download for Windows" para baixar o instalador.
Executar o Instalador:

Após o download, clique duas vezes no arquivo de instalação (normalmente chamado VSCodeSetup.exe) para iniciar o processo de instalação.
Configurar as Opções de Instalação:

Siga as instruções do assistente de instalação.
Você pode escolher as opções padrão ou personalizar a instalação de acordo com suas preferências.
Concluir a Instalação:

Após a conclusão da instalação, o Visual Studio Code estará pronto para ser usado.
Executar o Visual Studio Code:

Você pode encontrar o Visual Studio Code no menu Iniciar ou na área de trabalho. Clique no ícone para iniciar o aplicativo.

Feito isso estaremos prontos para instalar o composer.No qual foi feito da forma a baixo:

Baixe e execute o instalador do Composer para Windows a partir do site oficial.

Siga as instruções no instalador.

Durante a instalação, será solicitado que você escolha o PHP que deseja usar com o Composer. Se você já tiver o PHP instalado, 
selecione o caminho para o executável PHP. Caso contrário, você pode optar por baixar e instalar o PHP incluído com o Composer.

Também será necessário instalar o MySQL Workbench. Para isso basta seguir os passos a baixo:

Baixar o MySQL Installer:

Acesse o site oficial do MySQL: https://dev.mysql.com/downloads/installer/.
Baixe o MySQL Installer para Windows.
Executar o MySQL Installer:

Após o download, execute o instalador (mysql-installer-web-community-x.x.xx.x.msi, onde x.x.xx.x representa a versão).
O instalador exibirá várias opções. Escolha "Custom" para selecionar os componentes que deseja instalar.
Selecionar Componentes:

No instalador, escolha "MySQL Workbench" entre os componentes disponíveis. Isso instalará o MySQL Workbench, uma ferramenta gráfica 
para administrar bancos de dados MySQL.
Configurar o MySQL Workbench:

Complete o processo de instalação, fornecendo as informações necessárias, como senha para o usuário root do MySQL.
Concluir a Instalação:

Após a instalação, clique em "Next" e depois em "Execute" para concluir o processo.
Executar o MySQL Workbench:

Agora, você pode encontrar o MySQL Workbench no menu Iniciar ou na área de trabalho. Execute o aplicativo.
Conectar ao Servidor MySQL:

Ao abrir o MySQL Workbench, você pode conectar-se a um servidor MySQL existente ou criar uma nova conexão.

Abra o MySQL Workbench, crie o banco/schedule. No meu caso criei meu banco com o nome Pontue. Novamente abra o XAMPP e conecte 
necessário ver se as configurações do workbench está de acordo com o MySQL server do XAMPP, no caso a configuração correta é 
127.0.0.1, usuario root, senha root e a porta 3306. Se estiver configurado dessa forma no MySQL Workbench basta seguir para 
a próxima etapa, caso não esteja dessa forma será necessário configurar manualmente. A parte de usuário e senha eu configurei
de forma pessoal igual está no meu código onde é possivel ver na pasta .env.example no VScode, ele se encontra igual será 
postado a baixo:

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
porém podem ser configurados de outra forma, desde que na pasta .env.example dentro do VScode esteja da mesma forma feita no
MySQL Workbench. Exemplo a seguir é com o username e password root portanto a configuração seria da seguinte forma:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Pontue
DB_USERNAME=root
DB_PASSWORD=root
No meu caso eu configurei com meus dados onde eu substitui apenas meu username e a minha password.

Após a etapa anterior, abra o prompt de comando e digite composer para verificar se a instalação foi bem-sucedida.

Com o composer,XAMPP, MySQL Workbench e o VScode instalados, nós vamos startar o apache e o sql dentro do XAMPP.
Feito isso vamos pegar a pasta do projeto criado no qual nomeei de Pontue e colocar dentro da pasta htdocs no qual o seu caminho é
c://xampp/htdocs.
Agora dentro do VScode, configure as informações do banco no documento .env.example para ajustar de acordo com as diretrizes do projeto criado.
Feito isso abra o prompt de comando e vá até a pasta do projeto, feito isso devemos rodar o comando composer install, na sequência
composer update e após isso php artisan migrate e após o comando php artisan serve. Após rodar esses comandos já deve estar
tudo em funcionando. 

A seguir eu precisei fazer a instalação do postman e para isso eu segui os passos a seguir:

Acessar o Site Oficial:
https://www.postman.com/.
Baixar o Postman, faça o login, e import a colection que esta na raiz do projeto com o nome postmancollection, 
la vai ter as requisições do crud de produtos e clientes.

Para usar os codigos do PHPUnit basta ir para a pasta do projeto, ele se encontra em Feature que fica dentro da pasta do lado esquerdo tests, executei os codigos
do PHPUnit usando o comando php artisan test.
