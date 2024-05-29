CREATE TABLE D_Contact(
	IdContact int NOT NULL,
	NomContact varchar(50) NULL,
	PrenomContact varchar(50) NULL,
	MailContact varchar(50) NULL,
	TelContact varchar(50) NULL,
	IdFonction int NOT NULL,
	MpContact varchar(50) NULL
);

CREATE TABLE D_Coach(
	IdContactCoach int NOT NULL,
	IdSpe int NOT NULL
);


CREATE TABLE D_Client(
	IdContactClient int NOT NULL,
	Adrr1Client varchar(50) NULL,
	Adrr2Client varchar(50) NULL,
	VilleClient varchar(50) NULL,
	CpClient varchar(50) NULL,
	IdPays int NULL,
	NumCarteEtudiant varchar(50) NULL,
	IdCarte int NULL
);

CREATE TABLE D_Carte(
    IdCarte int NOT NULL,
    IdTypeCarte int NOT NULL,
	NumCarteBleu varchar(50) NULL,
	NomSurCarte varchar(50) NULL,
	CodeSecurite int NULL,
	EndDateCarte date NULL
);


CREATE TABLE D_Consult(
	IdConsult int NOT NULL,
	IdContactClient int NOT NULL,
	ConsulDate date NOT NULL,
	IdHorraire int NOT NULL,
	IdContactCoach int NOT NULL
);


CREATE TABLE D_Dispo(
	IdContactCoach int NOT NULL,
	IdJour int NOT NULL,
	AmDispo bit NOT NULL,
	PmDispo bit NOT NULL
);

CREATE TABLE D_Doc(
	IdDoc int NOT NULL,
	IdContact int NOT NULL,
	IdDocType int NOT NULL,
	NomDoc varchar(50) NOT NULL
);

CREATE TABLE P_DocType(
	IdDocType int NOT NULL,
	NomDocType varchar(50) NOT NULL
);




CREATE TABLE P_Fonction(
	IdFonction int NOT NULL,
	NomFonction varchar(50) NOT NULL
);

CREATE TABLE P_Horraire(
	IdHorraire int NOT NULL,
	IdBloc varchar(2) NOT NULL,
	Horraire varchar(5) NOT NULL
);


CREATE TABLE P_Jour(
	IdJour int NOT NULL,
	NomJour varchar(50) NOT NULL
);

CREATE TABLE P_Pays(
	IdPays int NOT NULL,
	NomPays varchar(50) NOT NULL
); 

CREATE TABLE P_Salle(
	IdSalle int NOT NULL,
	NumSalle varchar(50) NOT NULL,
	NomSalle varchar(50) NULL,
	TelSalle varchar(50) NULL,
	MailSalle varchar(50) NULL,
	IdContactCoach int NULL
);

CREATE TABLE P_Sport(
	IdSpe int NOT NULL,
	NomSpe varchar(50) NOT NULL,
	Activité bit NULL
);


CREATE TABLE P_TypeCarte(
	IdTypeCarte int NOT NULL,
	NomTypeCarte varchar(50) NOT NULL
);
