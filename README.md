# GravityForms-Valida-CPF-CNPJ
Plugin que habilita a validação de CNPJ ou CPF com um hook do Gravity Forms.

- Para utilizá-lo, adicione a classe "validar_cpf_cnpj" nos campos que deseja validar CPF ou CNPJ.
- Para mensagem de erro específica para CPF, adicione também a classe "tipo_cpf" no campo de CPF.
- Para mensagem de erro específica para CNPJ, adicione também a classe "tipo_cnpj" no campo de CNPJ.
- Este plugin vai funcionar se você tiver *ambos* os campos CPF e CNPJ no mesmo formulário.

**Adaptações a partir do original**

Plugin original de JP Tibério: https://github.com/jptiberio/GravityForms-Valida-CPF-CNPJ

- Verificar mais de um campo no mesmo formulário.
- Verificar se a classe de validação existe no campo, mesmo que existam outras classes configuradas.
- Mensagens de erro específicas por tipo (CPF ou CNPJ), usando classes adicionais.
- Não usar a validação se o campo está oculto pela condicional lógica do Gravity Forms.

**Este plugin é uma contribuição com a comunidade de desenvolvedores. Não há nenhuma garantia ou responsabilidade do autor sobre o uso em seu projeto. Use por sua conta e risco**
