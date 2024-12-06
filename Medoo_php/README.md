# Instrução para  uso 
- Baixar o mysql
- Baixar Mysql Workbench
- Criar conexão com usuario ="root" e senha="admin"
- Criar no Workbenck o banco de dados e as tabelas comforme as queries abaixo


```sql
create database colab;

use colab;


CREATE TABLE colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(255) NOT NULL,         
    cpf VARCHAR(11) NOT NULL,           
    email VARCHAR(255) NOT NULL       
    );


CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,               
    descricao TEXT NOT NULL,                        
    prazo_limite DATE NOT NULL,                  
    responsavel_id INT,                              
    prioridade ENUM('Baixa', 'Média', 'Alta') NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP, 
    data_execucao DATE ,                           
    FOREIGN KEY (responsavel_id) REFERENCES colaboradores(id)
);
```


- Baixar Xampp para executar o codigo
- Ativar apache no Xammp
- Colocar pasta raiz do projeto  na pasta \xampp\htdocs
- No navegador colar na barra de enderço este link(http://localhost/medoo_php/src/view/index.php)

- Ultilizar barra de navegação no canto superior da pagina para acessar as funcionalidades do projeto