# Como publicar e atualizar o site

## Primeira publicação
1. Acesse o painel da hospedagem (Hostinger) → **Gerenciador de Arquivos**.
2. Abra a pasta `public_html` do domínio `imediatacargo.com.br`.
3. Envie os dois arquivos da pasta `publicar/` deste repositório:
   - `index.html`
   - `enviar-cotacao.php`
4. Abra o site e envie uma cotação de teste.

## Atualizações
1. Gere/receba a nova versão do `index.html`.
2. Substitua `publicar/index.html` neste repositório (commit com mensagem clara, ex.: `Atualiza texto da seção Serviços`).
3. Envie o arquivo novo para o `public_html`, sobrescrevendo o antigo.

## E-mail do formulário
- Edite `$DESTINO` e `$REMETENTE` no início de `enviar-cotacao.php`.
- O remetente precisa ser um e-mail criado no próprio domínio, senão o provedor pode bloquear o envio.
- Se os e-mails não chegarem, confira a caixa de spam e se o `mail()` está habilitado no plano da hospedagem.

## Dicas
- A imagem `src/assets/images/foto-carga.png` pesa ~3 MB; comprimir (ex.: WebP) deixaria o site mais rápido.
- Faça backup de `publicar/` antes de cada atualização (o Git já guarda o histórico).
