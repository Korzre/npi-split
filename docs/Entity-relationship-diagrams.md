
```mermaid
---
title: DIAGRAMA DE ENTIDADE RELACIONAMENTO
---
erDiagram

 ACESSO ||--o{ Usuario: TIPIFICA

ACESSO{
   int id_acesso PK
   String tipo_acesso
}
 
 Usuario ||--o{ PRODUTO : COMPRA 
 Usuario{
   int id_user PK
   String(60) nome
   String(80) senha
   String(80) email
   String(80) matricula  
   String fk_acesso_id_acesso  
 }

  Usuario ||--o{ PRODUTO_CONSUMIDO : CONSOME

  PRODUTO{
   int id_produto PK
   String descricao
   int quantidade
   double preco
   int fk_usuario_id_user FK
  }

  PRODUTO_CONSUMIDO{
   int id_produto_cons PK  
   String Nome
   int quantidade
   int fk_produto_id_produto FK
  }

  TIMESTAMP{
    int id_timestamp 
    String type
    String descricao
    timestamp data
    tring nome
    timestamp data
    
  }
  


```
