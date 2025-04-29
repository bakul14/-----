SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_index.lst
PROMPT Скрипт создания индексов
PROMPT Бакулевский М. В. ИУ4-82Б

PROMPT Удаление индексов

DROP INDEX i_equip_id;

DROP INDEX i_prod_id;

DROP INDEX i_op_id;

DROP INDEX i_elem_id;

DROP INDEX i_us_id;

COMMIT;

PROMPT Создание индексов

CREATE UNIQUE INDEX i_equip_id ON equipment (equip_id);

PROMPT Добавление первичного ключа в таблицу products
CREATE UNIQUE INDEX i_prod_id ON products (prod_id);

PROMPT Добавление первичного ключа в таблицу operations
CREATE UNIQUE INDEX i_op_id ON operations (op_id);

PROMPT Добавление первичного ключа в таблицу elements
CREATE UNIQUE INDEX i_elem_id ON elements (elem_id);

PROMPT Добавление первичного ключа в таблицу users
CREATE UNIQUE INDEX i_us_id ON users (us_id);

COMMIT;

SPOOL off;