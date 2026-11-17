<div align="center">

# 🚚 Imediata Cargo — Site Institucional

**Transporte rodoviário de cargas para todo o Brasil, a partir de 150 kg.**

[www.imediatacargo.com.br](https://www.imediatacargo.com.br)

</div>

---

## Sobre o projeto

Site institucional da **Transportadora Imediata Cargo**, com formulário de **cotação de frete online**: o cliente preenche os dados da carga e a solicitação chega por e-mail na equipe comercial (ou pode ser enviada direto por WhatsApp).

### Seções do site

- **Cotação** — formulário com origem, destino, peso, volumes (cálculo automático de cubagem) e valor da NF
- **Serviços**, **Para quem**, **Diferenciais** e **Como funciona**
- **Clientes** — carrossel com logos
- **Dúvidas** (FAQ) e **Contato**

## Estrutura do repositório

```
.
├── publicar/                  ← PASTA PRONTA PARA PUBLICAR (é só enviar para a hospedagem)
│   ├── index.html             ← site completo em um único arquivo
│   └── enviar-cotacao.php     ← envia o formulário de cotação por e-mail
├── src/                       ← material de referência, organizado e legível
│   ├── pagina.html            ← código da página (sem os arquivos embutidos)
│   ├── assets/
│   │   ├── images/            ← logos, ilustração, foto e logos de clientes
│   │   └── fonts/             ← Archivo, IBM Plex Mono e Public Sans (woff2)
│   └── vendor/                ← bibliotecas de terceiros (React e runtime da página)
├── docs/
│   └── PUBLICACAO.md          ← passo a passo para publicar e atualizar o site
├── .gitignore
└── README.md
```

> **Importante:** o que vai para o ar é sempre o conteúdo de `publicar/`.
> A pasta `src/` serve para consultar e editar textos, trocar imagens e guardar o histórico dos arquivos originais.

## Como publicar

Resumo (detalhes em [`docs/PUBLICACAO.md`](docs/PUBLICACAO.md)):

1. Envie `publicar/index.html` e `publicar/enviar-cotacao.php` para a pasta `public_html` da hospedagem (Hostinger).
2. Faça um teste enviando uma cotação pelo formulário e confira se o e-mail chegou.

## Formulário de cotação

- Envia os dados por `POST` (JSON) para `enviar-cotacao.php`.
- O destinatário e o remetente ficam no topo do arquivo PHP (`$DESTINO` e `$REMETENTE`). O remetente deve ser um e-mail do próprio domínio.
- Possui proteção anti-spam (campo oculto) e limpeza dos campos antes de montar o e-mail.

## Tecnologias

HTML · CSS · JavaScript (React 18) · PHP (envio de e-mail) · Hostinger

## Contato

**Transportadora Imediata Cargo LTDA** · CNPJ 46.444.343/0001-46
Av. do Poeta, 450 — Jd. Julieta — São Paulo/SP — CEP 02161-160
📞 (11) 2688-3141 · 💬 WhatsApp (11) 94923-6272 · ✉️ comercial@imediatacargo.com.br

---

© Transportadora Imediata Cargo. Todos os direitos reservados.
