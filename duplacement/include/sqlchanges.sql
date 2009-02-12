ALTER TABLE `dup_students` ADD `st_keyskills` TEXT NOT NULL ,
ADD `st_resumeheadline` VARCHAR( 255 ) NOT NULL ,
ADD `st_resumepath` VARCHAR( 255 ) NOT NULL ,
ADD `st_textresume` TEXT NOT NULL ;


ALTER TABLE `dup_students` ADD `st_contact_no` VARCHAR( 100 ) NOT NULL ,
ADD `st_ug_qualification` VARCHAR( 100 ) NOT NULL ,
ADD `st_ug_specilization` VARCHAR( 100 ) NOT NULL ,
ADD `st_ug_univ` VARCHAR( 200 ) NOT NULL ,
ADD `st_ug_college` VARCHAR( 200 ) NOT NULL ,
ADD `st_ug_passyear` VARCHAR( 10 ) NOT NULL ,
ADD `st_pg_qualification` VARCHAR( 100 ) NOT NULL ,
ADD `st_ug_specilizationp` VARCHAR( 100 ) NOT NULL ,
ADD `st_pg_univ` VARCHAR( 100 ) NOT NULL ,
ADD `st_pg_college` VARCHAR( 200 ) NOT NULL ,
ADD `st_pg_passyear` VARCHAR( 10 ) NOT NULL ;


CREATE TABLE `dup_studentexp` (
`ex_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`ex_st_id` INT NOT NULL ,
`ex_number` INT NOT NULL ,
`ex_duration` VARCHAR( 100 ) NOT NULL ,
`ex_function` VARCHAR( 100 ) NOT NULL ,
`ex_industry` VARCHAR( 100 ) NOT NULL ,
`ex_remuneration` VARCHAR( 100 ) NOT NULL 
)