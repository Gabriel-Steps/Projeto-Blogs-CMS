# Sistema de Publicação de Blogs (CMS)

Este projeto é um sistema de publicação de blogs (CMS) desenvolvido em HTML, CSS, PHP e MySQL. O sistema permite que os usuários se registrem, façam login e gerenciem seus conteúdos de forma simples e intuitiva.



## Funcionalidades

- **Cadastro de Usuários:**
  - Os usuários podem se registrar fornecendo nome, e-mail, senha e uma imagem de perfil.
  - A imagem é armazenada no servidor.

- **Login de Usuários:**
  - Permite que usuários cadastrados façam login com e-mail e senha.
  - A senha é armazenada de forma segura no banco de dados, utilizando `password_hash`.

- **Gerenciamento de Blogs:**
  - A página principal exibe uma mensagem de boas-vindas com o nome e a imagem de perfil do usuário logado.
  - Futuramente, será possível criar, editar e excluir postagens de blog diretamente pela interface.

- **Logout:**
  - Possibilidade de encerrar a sessão atual de forma segura.

## Estrutura de Diretórios

```
src/
├── backend/
│   ├── cadastroUsuario.php
│   ├── conexao.php
│   ├── loginUsuario.php
│   ├── logout.php
│   ├── obterInformacoesPosts.php
├── pages/
│   ├── index.html
│   ├── cadastro.html
│   ├── paginaPrincipal.php
├── style/
│   ├── global.css
│   ├── styleAcesso.css
│   ├── stylePaginaPrincipal.css
├── scripts/
│   ├── inserirPostagensTela.js
│   ├── scriptTelaPrincipalEstilo.js
├── uploads/
│   └── (imagens de perfil dos usuários)
└── images/
    └── imagemAcesso.png
    └── menu-icon-x.png
    └── menu-icon.png
```

## Tecnologias Utilizadas

- **Frontend:**
  - HTML5
  - CSS3
  - Javascript

- **Backend:**
  - PHP 8+

- **Banco de Dados:**
  - MySQL

## Configuração do Ambiente

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/Gabriel-Steps/Projeto-Blogs-CMS.git
   cd Projeto-Blogs-CMS
   ```

2. **Configure o banco de dados:**
   - Crie um banco de dados MySQL com o nome `db_projetoblogs`.
   - Execute o script SQL para criar a tabela de usuários:
     ```sql
     CREATE TABLE usuarios (
         id INT AUTO_INCREMENT PRIMARY KEY,
         nome VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL UNIQUE,
         senha VARCHAR(255) NOT NULL,
         imagem VARCHAR(255) NOT NULL
     );
     CREATE TABLE postagens(
	    id INT PRIMARY KEY AUTO_INCREMENT,
        tituto VARCHAR(100) NOT NULL,
        conteudo longtext NOT NULL,
        data_criacao DATE NOT NULL,
    	usuario_id INT NOT NULL,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        );
    
     CREATE TABLE comentarios(
         id INT PRIMARY KEY AUTO_INCREMENT,
         conteudo longtext NOT NULL,
         data_criacao DATE NOT NULL,
         postagem_id INT NOT NULL,
         usuario_id INT NOT NULL,
         FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
         FOREIGN KEY (postagem_id) REFERENCES postagens(id)
        );
     ```

3. **Atualize as credenciais de conexão no arquivo `backend/conexao.php`:**
   ```php
   $host = 'seu-servidor';
   $db = 'db_projetoblogs';
   $user = 'seu-usuario';
   $password = 'sua-senha';
   ```

4. **Configuração do servidor web:**
   - Instale o XAMPP ou qualquer servidor local que suporte PHP e MySQL.
   - Coloque os arquivos do projeto dentro do diretório `htdocs` (no caso do XAMPP).

5. **Acesse a aplicação:**
   - Inicie o servidor MySQL e o Apache no painel do XAMPP.
   - Abra o navegador e acesse: `http://localhost/Projeto-Blogs-CMS/pages/index.html`

## Melhorias Futuras

- Implementação de um painel de administração para criar postagens de blog.
- Validação de formulários no frontend.
- Recuperação de senha por e-mail.
- Suporte a múltiplos idiomas.

## Diagrama UML
```mermaid
classDiagram
    class usuarios {
        +id: INT
        +nome: VARCHAR(255)
        +email: VARCHAR(255)
        +senha: VARCHAR(255)
        +imagem: VARCHAR(255)
    }

    class postagens {
        +id: INT
        +titulo: VARCHAR(100)
        +conteudo: LONGTEXT
        +data_criacao: DATE
        +usuario_id: INT
    }

    class comentarios {
        +id: INT
        +conteudo: LONGTEXT
        +data_criacao: DATE
        +postagem_id: INT
        +usuario_id: INT
    }

    usuarios "1" --> "N" postagens
    usuarios "1" --> "N" comentarios
    postagens "1" --> "N" comentarios
```markdown
