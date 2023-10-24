# Aplicativo de Registro de Ações dos Bombeiros NOAR

![noar_small_logo](https://github.com/0gudu/app_bombeiros/assets/89671108/2a79c96b-1437-4e8f-b2b1-3c3e472e2d24)

## Visão Geral

Este aplicativo foi desenvolvido para facilitar o processo de registro das ações realizadas pelos bombeiros do NOAR. Após cada ação, os bombeiros podem responder um questionário de controle de danos para avaliar o estado da equipe envolvida na ocorrência. O aplicativo oferece uma maneira mais prática de coletar e gerenciar essas informações, substituindo o uso de folhas de papel.

## Funcionalidades

- **Carregamento de Perguntas Personalizadas**: O aplicativo permite o carregamento de perguntas personalizadas a partir de um arquivo JSON. Isso proporciona flexibilidade na definição das perguntas a serem feitas após cada ação.

- **Área de Administração**: Os administradores têm acesso a uma área exclusiva para gerenciar as respostas dos bombeiros. Eles podem visualizar, exportar e analisar os dados coletados de forma eficiente.

- **Usuários do Aplicativo**: Os bombeiros têm acesso a uma interface simples e intuitiva para responder às perguntas após cada ação. As respostas são registradas e armazenadas de forma segura.

- **Otimização**: O aplicativo foi otimizado para garantir desempenho e usabilidade eficiente, permitindo que os bombeiros se concentrem em suas atividades essenciais.

## Instalação

Siga as etapas abaixo para configurar e instalar o projeto em seu ambiente:

### Pré-requisitos

1. **Ambiente de Desenvolvimento**: Certifique-se de ter um ambiente de desenvolvimento configurado com um servidor web (como Apache ou Nginx) e PHP instalado. Você também deve ter um servidor de banco de dados MySQL ou outro banco de dados compatível.

2. **Clone o Repositório**: Clone o repositório do projeto em seu servidor local ou de hospedagem:

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```

### Configuração do Banco de Dados

3. **Banco de Dados**: Importe o arquivo SQL fornecido (normalmente com extensão `.sql`) para criar o banco de dados e as tabelas necessárias. Você pode fazer isso através da linha de comando ou usando uma ferramenta de gerenciamento de banco de dados (por exemplo, o phpMyAdmin):

   ```bash
   mysql -u seu-usuario -p sua-base-de-dados < caminho/para/seuarquivo.sql
   ```

### Configuração do Projeto

4. **Configuração do PHP**:
5. 
   - Edite o arquivo `config.php` para incluir as informações de conexão com o banco de dados, como nome do banco de dados, usuário e senha.

   Exemplo de configuração no arquivo `config.php`:

   ```php
   <?php
   $host = 'localhost';
   $dbname = 'seu-banco-de-dados';
   $usuario = 'seu-usuario';
   $senha = 'sua-senha';
   ?>
   ```

### Uso

5. Acesse o aplicativo em seu navegador através do URL apropriado. Você pode acessar a página principal do aplicativo para interagir com ele.

6. O aplicativo deve agora estar funcionando, e você pode começar a usá-lo para o propósito desejado.

## Contribuição

Se você deseja contribuir para este projeto, siga os passos abaixo:

1. Faça um fork do repositório.

2. Crie uma branch com uma descrição significativa da sua contribuição:

   ```bash
   git checkout -b minha-contribuicao
   ```

3. Faça as alterações desejadas.

4. Faça commit das suas alterações:

   ```bash
   git commit -m "Adicionando funcionalidade X"
   ```

5. Envie suas alterações para o seu fork:

   ```bash
   git push origin minha-contribuicao
   ```

6. Abra um pull request para revisão.

## Licença

Este projeto é licenciado sob a Licença MIT. Consulte o arquivo [LICENSE](LICENSE) para obter detalhes.

## Contato

Para mais informações ou suporte, entre em contato conosco em [email](mailto:gustavojosepaulo@gmail.com).

