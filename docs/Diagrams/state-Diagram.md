```mermaid
stateDiagram
  [*] --> AguardandoOperacao
  AguardandoOperacao --> AguardandoDados: Seleção de Operação
  AguardandoDados --> CriandoProduto: Dados recebidos
  AguardandoDados --> DadosInvalidos: Dados não recebidos
  CriandoProduto --> ProdutoCriado: Produto criado com sucesso
  CriandoProduto --> CriacaoInvalida: Dados inválidos
  AtualizandoProduto --> ProdutoAtualizado: Produto atualizado com sucesso
  AtualizandoProduto --> AtualizacaoInvalida: Dados inválidos
  LendoProduto --> ProdutoLido: Produto encontrado
  LendoProduto --> ProdutoNaoEncontrado: Produto não encontrado
  DeletandoProduto --> ProdutoDeletado: Produto deletado com sucesso
  DeletandoProduto --> ProdutoNaoEncontrado: Produto não encontrado


```