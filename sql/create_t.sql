SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_t.lst
PROMPT Cкрипт создания триггеров
PROMPT Автор Бакулевский М. В. ИУ4-82Б

PROMPT Скрипт создания триггера для таблицы equipment
CREATE OR REPLACE TRIGGER t_equip_id
BEFORE INSERT ON equipment
FOR EACH ROW
BEGIN
SELECT s_equip_id.nextval
INTO :new.equip_id
FROM dual;
END; 
/

PROMPT Скрипт создания триггера для таблицы products
CREATE OR REPLACE TRIGGER t_prod_id
BEFORE INSERT ON products
FOR EACH ROW
BEGIN
SELECT s_prod_id.nextval
INTO :new.prod_id
FROM dual;
END; 
/

PROMPT Скрипт создания триггера для таблицы operations
CREATE OR REPLACE TRIGGER t_op_id
BEFORE INSERT ON operations
FOR EACH ROW
BEGIN
SELECT s_op_id.nextval
INTO :new.op_id
FROM dual;
END; 
/

PROMPT Скрипт создания триггера для таблицы elements
CREATE OR REPLACE TRIGGER t_elem_id
BEFORE INSERT ON elements
FOR EACH ROW
BEGIN
SELECT s_elem_id.nextval
INTO :new.elem_id
FROM dual;
END; 
/

PROMPT Скрипт создания триггера для таблицы users
CREATE OR REPLACE TRIGGER t_us_id
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
SELECT s_us_id.nextval
INTO :new.us_id
FROM dual;
END; 
/


COMMIT;

SPOOL off;