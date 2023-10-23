CREATE DATABASE datosdb
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;


    CREATE TABLE IF NOT EXISTS public.informacion
(
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 2 MINVALUE 1 MAXVALUE 9223372036854775807 CACHE 1 ),
    nombrearchivo character varying(250) COLLATE pg_catalog."default" NOT NULL,
    cantlineas bigint NOT NULL,
    cantpalabras bigint NOT NULL,
    fecharegistro timestamp without time zone NOT NULL,
    cantcaracteres bigint,
    CONSTRAINT informacion_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.informacion
    OWNER to postgres;

    