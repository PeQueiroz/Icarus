CREATE TABLE Usuario 
( 
 ID_Usuario INT PRIMARY KEY AUTO_INCREMENT,  
 Nome VARCHAR(30) NOT NULL,  
 Email VARCHAR(30) NOT NULL,  
 Idade INT NOT NULL,  
 Senha INT NOT NULL,  
 CPF INT NOT NULL,  
 Data_Nascimento DATE NOT NULL,  
 UNIQUE (Email,Senha,CPF)
);

CREATE TABLE Perfil 
( 
 ID_Perfil INT PRIMARY KEY AUTO_INCREMENT,  
 ID_Usuario INT,  
 ID_Diagnostico INT NOT NULL
);

CREATE TABLE Funcionario 
( 
 ID_Funcionario INT PRIMARY KEY,  
 Nome VARCHAR(n) NOT NULL,  
 Especialidade VARCHAR(n) NOT NULL,  
 Descricao VARCHAR(n) NOT NULL,  
 Contato VARCHAR(n),  
 Status VARCHAR(n) NOT NULL 
); 

CREATE TABLE Conversa 
( 
 ID_conversa INT PRIMARY KEY AUTO_INCREMENT,  
 ID_Funcionario INT,  
 ID_Usuario INT
);

CREATE TABLE Evento_Calendario 
( 
 ID_Evento INT PRIMARY KEY AUTO_INCREMENT,  
 ID_Usuario INT,  
 Nome VARCHAR(30) NOT NULL,  
 Data DATE NOT NULL
);

CREATE TABLE Diagnostico_Cognitivo 
( 
 ID_Diagnostico INT PRIMARY KEY AUTO_INCREMENT,  
 Nome INT NOT NULL,  
 Descricao VARCHAR(30) NOT NULL
);

ALTER TABLE Perfil ADD FOREIGN KEY(ID_Diagnostico) REFERENCES Diagnostico_Cognitivo (ID_Diagnostico);
ALTER TABLE Funcionario ADD FOREIGN KEY(ID_Usuario) REFERENCES Usuario (ID_Usuario);
ALTER TABLE Conversa ADD FOREIGN KEY(ID_Funcionario) REFERENCES Funcionario (ID_Funcionario);
ALTER TABLE Conversa ADD FOREIGN KEY(ID_Usuario) REFERENCES Usuario (ID_Usuario);
ALTER TABLE Evento_Calendario ADD FOREIGN KEY(ID_Usuario) REFERENCES Usuario (ID_Usuario);