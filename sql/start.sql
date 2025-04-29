SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\start.lst
PROMPT Скрипт включения sql скриптов
PROMPT Бакулевский М. В. ИУ4-82Б

    @@create_table.sql;
    @@create_index.sql;
    @@create_pk.sql;
    @@create_fk.sql;
    @@create_seq.sql;
    @@create_t.sql;
    @@create_values;

COMMIT;

SPOOL off;
        