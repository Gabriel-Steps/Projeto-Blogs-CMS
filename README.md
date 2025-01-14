```mermaid
classDiagram
    class usuarios {
        +id: INT
        +nome: VARCHAR(100)
        +email: VARCHAR(255)
        +senha: VARCHAR(255)
        +imagem: VARCHAR(100)
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
