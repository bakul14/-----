SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_table.lst
PROMPT ������ �������� ������
PROMPT �������� �. �. ��4-82�

PROMPT �������� ������� equipment
DROP TABLE equipment CASCADE CONSTRAINTS;
CREATE TABLE equipment    (
          equip_id    INTEGER  NOT NULL 
        , equip_name    VARCHAR2(255)  NULL 
        , equip_type    VARCHAR2(255)  NULL 
        , equip_op_id   INTEGER  NOT NULL)
TABLESPACE users;

PROMPT �������� ������� products
DROP TABLE products CASCADE CONSTRAINTS;
CREATE TABLE products    (
          prod_id   INTEGER  NOT NULL 
        , prod_date   VARCHAR2(255)  NULL 
        , prod_condition    VARCHAR2(255)  NULL 
        , prod_name   VARCHAR2(255)  NULL 
        , prod_op_id    INTEGER  NOT NULL)
TABLESPACE users;

PROMPT �������� ������� operations
DROP TABLE operations CASCADE CONSTRAINTS;
CREATE TABLE operations    (
          op_id   INTEGER  NOT NULL 
         ,op_cost   INTEGER  NULL 
         ,op_dur    INTEGER  NULL 
         ,op_name   VARCHAR2(255)  NULL
         ,op_desc   VARCHAR2(255)  NULL
         ,op_type   VARCHAR2(255)  NULL
         ,op_us_position VARCHAR2(255) NOT NULL)
TABLESPACE users;

PROMPT �������� ������� elements    
DROP TABLE elements CASCADE CONSTRAINTS;
CREATE TABLE elements    (
          elem_id	  INTEGER  NOT NULL
         ,elem_name VARCHAR2(255) NULL
         ,elem_provider	  VARCHAR2(255)  NULL
         ,elem_nominal	  VARCHAR2(255)  NULL
         ,elem_type	  VARCHAR2(255)  NULL
         ,elem_op_id	  INTEGER  NOT NULL)
TABLESPACE users;

PROMPT �������� ������� users
DROP TABLE users CASCADE CONSTRAINTS;
CREATE TABLE users   (
          us_id	  INTEGER  NOT NULL
         ,us_login	  VARCHAR2(255)  NULL 
         ,us_password  VARCHAR2(255)  NULL 
         ,us_permission  VARCHAR2(255)  NULL 
         ,us_firstname VARCHAR2(255) NULL
         ,us_surname VARCHAR2(255)  NULL 
         ,us_lastname VARCHAR2(255)  NULL
         ,us_position VARCHAR2(255) NULL
         ,CONSTRAINT c_us_position UNIQUE (us_position))
TABLESPACE users;

COMMIT;

SPOOL off;