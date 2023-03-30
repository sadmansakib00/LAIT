CREATE TABLE Candidate(
	[CandidateID] [int] IDENTITY(1,1) NOT NULL, ~Candidate id auto increment~
	[IndeedID] [varchar](20) NULL,
	[CandidateName] [nvarchar](80) NULL,
	[Education] [nvarchar](250) NULL,
	[Postcode] [nvarchar](20) NULL,
	[Email] [nvarchar](80) NULL,
 CONSTRAINT [PK_Candidate] PRIMARY KEY (CandidateID)
)

CREATE TABLE InitialApplicants (
    CandidateID int NOT NULL AUTO_INCREMENT,
    IndeedID varchar(255),
    CandidateName varchar(255),
    Education varchar(255),
	Postcode varchar(255),
	Email varchar(255),
    PRIMARY KEY (CandidateID)
);


~~~

CREATE TABLE Applicant(
	[ApplicantID] [int] IDENTITY(1,1) NOT NULL,
	[ApplicantName] [varchar](100) NULL,
	[Email] [varchar](100) NOT NULL,
	[UKPermit] [varchar](1000) NULL,
	[CommWork] [varchar](50) NULL,
	[SkillNote] [varchar](100) NULL,
	[DateAdded] [datetime] NULL,
 CONSTRAINT PK__Applican PRIMARY KEY (ApplicantID) 
 );
 
 
 CREATE TABLE ApplicantSkill(
	ApplicantId int NOT NULL,
	SkillId int NOT NULL,
 CONSTRAINT PK_ApplicantSkill PRIMARY KEY (ApplicantId, SkillId)
 );
 
 
 CREATE TABLE ApplicantSkill (
    ApplicantID int,
    SkillID int,
    PRIMARY KEY (ApplicantID, SkillID)
);
 
 
 
 //MySQL
 
 CREATE DATABASE LAIT_HR;
 
 
 CREATE TABLE SkillsLookUp (
    SkillID int NOT NULL AUTO_INCREMENT,
    Skill varchar(255),
    PRIMARY KEY (SkillID)
);
 
 
 CREATE TABLE InitialApplicant (
    CandidateID int NOT NULL AUTO_INCREMENT,
    IndeedID varchar(255),
    CandidateName varchar(255),
    Education varchar(255),
	Postcode varchar(255),
	Email varchar(255),
    PRIMARY KEY (CandidateID)
);
 
 
 CREATE TABLE Applicant (
    ApplicantID int NOT NULL AUTO_INCREMENT,
	CandidateID int,
    ApplicantName varchar(255),
    Email varchar(255),
    UKPermit varchar(255),
    CommWork varchar(255),
	SkillNote varchar(255),
    DateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ApplicantID),
	FOREIGN KEY (CandidateID) REFERENCES InitialApplicants(CandidateID)
);


CREATE TABLE ApplicantSkill (
    ApplicantID int,
    SkillID int,
    PRIMARY KEY (ApplicantID, SkillID)
);


~~~
CREATE TABLE SkillsLookup (
    SkillID int NOT NULL AUTO_INCREMENT,
    Skill varchar(255),
    PRIMARY KEY (SkillID)
);
 
 CREATE TABLE InitialApplicant (
    CandidateID int NOT NULL AUTO_INCREMENT,
    IndeedID varchar(50) UNIQUE,
    CandidateName varchar(100),
    Education varchar(255),
	Postcode varchar(50),
	Email varchar(255) UNIQUE,
    PRIMARY KEY (CandidateID)
);
 
 CREATE TABLE Applicant (
    ApplicantID int NOT NULL AUTO_INCREMENT,
	CandidateID int UNIQUE,
    ApplicantName varchar(100),
    Email varchar(255) UNIQUE,
    UKPermit varchar(10),
    UKPermitNote varchar(500),
    CommissionWork varchar(10),
    CommissionWorkNote varchar(500),
	SkillNote varchar(255),
    DateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ApplicantID),
	FOREIGN KEY (CandidateID) REFERENCES InitialApplicant(CandidateID)
);

CREATE TABLE ApplicantSkill (
    ApplicantID int,
    SkillID int,
    PRIMARY KEY (ApplicantID, SkillID),
    FOREIGN KEY (ApplicantID) REFERENCES Applicant(ApplicantID),
    FOREIGN KEY (SkillID) REFERENCES SkillsLookup(SkillID)
);

