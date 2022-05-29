FROM mysql:8.0

COPY ./zinio_db.sql /docker-entrypoint-initdb.d/zinio_db.sql
COPY ./testing.sql /docker-entrypoint-initdb.d/testing.sql
