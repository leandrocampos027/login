🔐 Sistema de Login com Recuperação de Senha em PHP (POO + PDO + PHPMailer)

Este projeto é um sistema de login seguro e completo, desenvolvido em PHP utilizando Programação Orientada a Objetos (POO), conexão com banco de dados via PDO e envio de e-mails com PHPMailer.
O foco está na segurança, organização do código e boas práticas no controle de autenticação de usuários.

✅ Funcionalidades implementadas:
- Tela de login com validação de e-mail e senha
- Cadastro de novos usuários
- Recuperação de senha via e-mail com:
- Geração de token único com código de verificação
- Validação com prazo de expiração
- Alteração de senha somente vinculada ao e-mail que solicitou
- Proteção de páginas restritas (validação de sessão)
- Senhas criptografadas com password_hash
- Tokens codificados com base64 para segurança na URL
- Estrutura de código modular com classes organizadas
- Interface simples e clara

🛠️ Tecnologias utilizadas:
- PHP 7.4+
- PDO (PHP Data Objects)
- PHPMailer
- HTML5 / CSS3 (layout básico)
- MySQL (ou MariaDB)
- Interface com Bootstrap.

Este projeto foi desenvolvido com fins didáticos, como forma de praticar a aplicação de conceitos fundamentais da segurança em autenticação, uso de POO com PHP, e integração de recursos reais de envio de e-mail em aplicações web. Ideal para quem está começando ou quer entender a fundo como funciona um fluxo seguro de login e recuperação de senha.

✨ Melhorias futuras:
- Integração com reCAPTCHA
- Validação por link clicável ao invés de código manual
- Registro de logs de acesso




