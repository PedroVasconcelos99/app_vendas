# **App Vendas**

Sistema de vendas criado como parte do teste da empresa **SGASoft**.

---

## **Sobre o Projeto**

Este projeto é um sistema de vendas desenvolvido em Laravel. Ele inclui funcionalidades como:

- Gerenciamento de clientes.
- Controle de lojas, vendedores e produtos.
- Cadastro e acompanhamento de vendas.

---

## **Requisitos**

Certifique-se de ter os seguintes itens instalados no seu sistema:

- **PHP** >= 8.0 ([Download PHP](https://www.php.net/))
- **Composer** ([Download Composer](https://getcomposer.org/))
- **Node.js** ([Download Node.js](https://nodejs.org/pt))
- **MySQL** (ou outro banco de dados compatível)

> ⚙️ **Dica**: Utilize o [XAMPP](https://www.apachefriends.org/pt_br/index.html) para configurar facilmente um ambiente local com PHP e MySQL.

---

## **Instalação**

Siga os passos abaixo para configurar e executar o projeto localmente.

---

### **Passo 1: Clonar o Repositório**

No terminal, execute:

```bash
git clone https://github.com/PedroVasconcelos99/app_vendas.git
cd app_vendas
```

---

### **Passo 2: Instalar Dependências do PHP**

No diretório do projeto, instale as dependências do Laravel:

```bash
composer install
```

> ⚠️ **Nota**: Se ocorrer um erro relacionado ao `zip`, ative a extensão `zip` no arquivo de configuração do PHP (`php.ini`).

---

### **Passo 3: Instalar Dependências do Node.js**

Instale as dependências do frontend:

```bash
npm install
```

---

### **Passo 4: Configurar o Arquivo `.env`**

Crie uma cópia do arquivo `.env.example` e ajuste as variáveis conforme necessário (banco de dados, chave da aplicação, etc.):

```bash
copy .env.example .env
```

---

### **Passo 5: Gerar a Chave da Aplicação**

Gere a chave única da aplicação:

```bash
php artisan key:generate
```

---

### **Passo 6: Executar Migrações**

Crie as tabelas no banco de dados e preencha dados iniciais:

```bash
php artisan migrate --seed
```

---

### **Passo 7: Compilar os Assets Frontend**

Compile os arquivos CSS/JavaScript para desenvolvimento:

```bash
npm run dev
```

Para produção, use:

```bash
npm run build
```

---

### **Passo 8: Iniciar o Servidor**

No terminal, execute:

```bash
php artisan serve
```

A aplicação estará disponível em [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## **Problemas Comuns**

- **Erro ao instalar dependências PHP (`zip` não ativado):**
  - Habilite a extensão `zip` no arquivo `php.ini`.

- **Erro ao rodar migrações:**
  - Verifique as credenciais do banco de dados no arquivo `.env`.

- **Problemas com permissão:**
  - Certifique-se de que as pastas `storage` e `bootstrap/cache` têm permissão de gravação:
    ```bash
    chmod -R 775 storage bootstrap/cache
    ```

---

## **Suporte**

Se você encontrar problemas ou tiver dúvidas, entre em contato pelo [GitHub Issues](https://github.com/PedroVasconcelos99/app_vendas/issues).

**Obrigado por usar o App Vendas!** 🚀

