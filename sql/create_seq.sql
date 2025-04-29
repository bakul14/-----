SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_s.lst
PROMPT Скрипт создания последовательностей
PROMPT Бакулевский М. В. ИУ4-82Б

PROMPT Создание последовательности для таблицы equipment
DROP SEQUENCE s_equip_id;
CREATE SEQUENCE s_equip_id INCREMENT BY 1 START WITH 1;

PROMPT Создание последовательности для таблицы products
DROP SEQUENCE s_prod_id;
CREATE SEQUENCE s_prod_id INCREMENT BY 1 START WITH 1;

PROMPT Создание последовательности для таблицы operations
DROP SEQUENCE s_op_id;
CREATE SEQUENCE s_op_id INCREMENT BY 1 START WITH 1;

PROMPT Создание последовательности для таблицы elements
DROP SEQUENCE s_elem_id;
CREATE SEQUENCE s_elem_id INCREMENT BY 1 START WITH 1;

PROMPT Создание последовательности для таблицы users
DROP SEQUENCE s_us_id;
CREATE SEQUENCE s_us_id INCREMENT BY 1 START WITH 1;


COMMIT;

SPOOL off;