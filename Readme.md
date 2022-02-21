```sql=
#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_us    Int  Auto_increment  NOT NULL ,
        nom      Varchar (100) NOT NULL ,
        prenom   Varchar (100) NOT NULL ,
        email    Varchar (250) NOT NULL ,
        password Varchar (250) NOT NULL ,
        role     Varchar (200) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_us)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: espece
#------------------------------------------------------------

CREATE TABLE espece(
        id_es Int  Auto_increment  NOT NULL ,
        nom   Varchar (100) NOT NULL
	,CONSTRAINT espece_PK PRIMARY KEY (id_es)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: animaux
#------------------------------------------------------------

CREATE TABLE animaux(
        id_an          Int  Auto_increment  NOT NULL ,
        nom            Varchar (200) NOT NULL ,
        date_naissance Date NOT NULL ,
        genre          Varchar (200) NOT NULL ,
        photo          Text NOT NULL ,
        lieu           Varchar (200) NOT NULL ,
        is_adopt       Bool NOT NULL ,
        id_us          Int ,
        id_es          Int
	,CONSTRAINT animaux_PK PRIMARY KEY (id_an)

	,CONSTRAINT animaux_user_FK FOREIGN KEY (id_us) REFERENCES user(id_us)
	,CONSTRAINT animaux_espece0_FK FOREIGN KEY (id_es) REFERENCES espece(id_es)
)ENGINE=InnoDB;

```

![](https://i.imgur.com/Gf8MIDE.png)
