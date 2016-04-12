--
-- PostgreSQL database dump
--

-- Dumped from database version 9.0.18
-- Dumped by pg_dump version 9.0.18
-- Started on 2016-04-12 16:08:25

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 147 (class 1259 OID 16405)
-- Dependencies: 5
-- Name: levels; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE levels (
    id integer NOT NULL,
    level character varying(20) NOT NULL
);


ALTER TABLE public.levels OWNER TO postgres;

--
-- TOC entry 146 (class 1259 OID 16403)
-- Dependencies: 147 5
-- Name: levels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE levels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.levels_id_seq OWNER TO postgres;

--
-- TOC entry 1827 (class 0 OID 0)
-- Dependencies: 146
-- Name: levels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE levels_id_seq OWNED BY levels.id;


--
-- TOC entry 1828 (class 0 OID 0)
-- Dependencies: 146
-- Name: levels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('levels_id_seq', 1, true);


--
-- TOC entry 151 (class 1259 OID 16460)
-- Dependencies: 5
-- Name: questions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE questions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questions_id_seq OWNER TO postgres;

--
-- TOC entry 1829 (class 0 OID 0)
-- Dependencies: 151
-- Name: questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('questions_id_seq', 8, true);


--
-- TOC entry 148 (class 1259 OID 16411)
-- Dependencies: 1803 5
-- Name: questions; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE questions (
    id integer DEFAULT nextval('questions_id_seq'::regclass) NOT NULL,
    question text NOT NULL,
    option_a text NOT NULL,
    option_b text NOT NULL,
    option_c text NOT NULL,
    option_d text NOT NULL,
    flag_answer character(1) NOT NULL
);


ALTER TABLE public.questions OWNER TO postgres;

--
-- TOC entry 145 (class 1259 OID 16396)
-- Dependencies: 5
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    kode character varying(20) NOT NULL,
    nama character varying(60) NOT NULL,
    username character varying(20) NOT NULL,
    password character varying(60) NOT NULL,
    level_id integer
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 150 (class 1259 OID 16421)
-- Dependencies: 5
-- Name: users_answers; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users_answers (
    id integer NOT NULL,
    question_id bigint,
    answer character(1) NOT NULL,
    user_id integer
);


ALTER TABLE public.users_answers OWNER TO postgres;

--
-- TOC entry 149 (class 1259 OID 16419)
-- Dependencies: 5 150
-- Name: users_answers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_answers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_answers_id_seq OWNER TO postgres;

--
-- TOC entry 1830 (class 0 OID 0)
-- Dependencies: 149
-- Name: users_answers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_answers_id_seq OWNED BY users_answers.id;


--
-- TOC entry 1831 (class 0 OID 0)
-- Dependencies: 149
-- Name: users_answers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_answers_id_seq', 1, false);


--
-- TOC entry 144 (class 1259 OID 16394)
-- Dependencies: 5 145
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 1832 (class 0 OID 0)
-- Dependencies: 144
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1833 (class 0 OID 0)
-- Dependencies: 144
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 4, true);


--
-- TOC entry 1802 (class 2604 OID 16408)
-- Dependencies: 147 146 147
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY levels ALTER COLUMN id SET DEFAULT nextval('levels_id_seq'::regclass);


--
-- TOC entry 1801 (class 2604 OID 16399)
-- Dependencies: 144 145 145
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 1804 (class 2604 OID 16424)
-- Dependencies: 149 150 150
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_answers ALTER COLUMN id SET DEFAULT nextval('users_answers_id_seq'::regclass);


--
-- TOC entry 1820 (class 0 OID 16405)
-- Dependencies: 147
-- Data for Name: levels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY levels (id, level) FROM stdin;
1	Administrator
2	Peserta
\.


--
-- TOC entry 1821 (class 0 OID 16411)
-- Dependencies: 148
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY questions (id, question, option_a, option_b, option_c, option_d, flag_answer) FROM stdin;
1	Siapakah nama Kepala BPS Provinsi Kalimantan Barat?	Ir. Pitono, MAP	Badar, SE, MSi	Sudiyanto, S.Si, MM	Muhammad Farid Fadhlan, M. Eng	a
2	Apakah Kepanjangan SE?	Sensus Ekonomi	Survei Ekonomi	Survei Evaluasi Ekonomi	Sensus Evaluasi Ekonomi	a
3	Apa tugas pengentri	Mendata	Menyalin dari kusesioner ke media komputer	evaluasi	Salah semua	b
4	Tugas pokok BPS adalah	Menyurvei	Menyensus	Menggoreng	Memasak	d
5	Mengapa harus dientri?	Supaya betul	supaya cocok	supaya mantap	daripada enggak?	c
6	Pernahkah anda ikut kegiatan survei bps	ya sebagai pencacah	Ya, sebagai pengawas	ya sebagai pengentri	tidak pernah	c
7	<p>Siapakah saya?</p>	<p>Embuh</p>	<p>Sakarepmu</p>	<p>Aku ra ngerti</p>	<p>yowes</p>	d
8	<p>Gambar apakah ini ?</p>\r\n<p><img src="../quirk/images/photos/loggeduser.png" alt="" width="128" height="128" /></p>	<p>asas</p>	<p>sasas</p>	<p>sdsd</p>	<p>fdfdf</p>	c
\.


--
-- TOC entry 1819 (class 0 OID 16396)
-- Dependencies: 145
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, kode, nama, username, password, level_id) FROM stdin;
1	6100.001	Muhammad Farid Fadhlan	farid	$2y$13$6yWNXcQYyRGBAdmAYi1b6Oa3Fm6uzsBMlUVA20X0rp16gz488QCly	1
4	6100.101	Joko Widodo	jokowi	$2y$13$6yWNXcQYyRGBAdmAYi1b6Oa3Fm6uzsBMlUVA20X0rp16gz488QCly	2
\.


--
-- TOC entry 1822 (class 0 OID 16421)
-- Dependencies: 150
-- Data for Name: users_answers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users_answers (id, question_id, answer, user_id) FROM stdin;
\.


--
-- TOC entry 1807 (class 2606 OID 16402)
-- Dependencies: 145 145
-- Name: Key1; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT "Key1" PRIMARY KEY (id);


--
-- TOC entry 1809 (class 2606 OID 16410)
-- Dependencies: 147 147
-- Name: Key2; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY levels
    ADD CONSTRAINT "Key2" PRIMARY KEY (id);


--
-- TOC entry 1811 (class 2606 OID 16463)
-- Dependencies: 148 148
-- Name: Key3; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT "Key3" PRIMARY KEY (id);


--
-- TOC entry 1815 (class 2606 OID 16428)
-- Dependencies: 150 150
-- Name: Key5; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_answers
    ADD CONSTRAINT "Key5" PRIMARY KEY (id);


--
-- TOC entry 1805 (class 1259 OID 16400)
-- Dependencies: 145
-- Name: IX_Relationship1; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_Relationship1" ON users USING btree (level_id);


--
-- TOC entry 1812 (class 1259 OID 16425)
-- Dependencies: 150
-- Name: IX_Relationship3; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_Relationship3" ON users_answers USING btree (user_id);


--
-- TOC entry 1813 (class 1259 OID 16426)
-- Dependencies: 150
-- Name: IX_Relationship5; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_Relationship5" ON users_answers USING btree (question_id);


--
-- TOC entry 1816 (class 2606 OID 16429)
-- Dependencies: 145 1808 147
-- Name: Relationship1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT "Relationship1" FOREIGN KEY (level_id) REFERENCES levels(id);


--
-- TOC entry 1817 (class 2606 OID 16434)
-- Dependencies: 150 145 1806
-- Name: Relationship3; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_answers
    ADD CONSTRAINT "Relationship3" FOREIGN KEY (user_id) REFERENCES users(id);


--
-- TOC entry 1818 (class 2606 OID 16464)
-- Dependencies: 1810 148 150
-- Name: Relationship5; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_answers
    ADD CONSTRAINT "Relationship5" FOREIGN KEY (question_id) REFERENCES questions(id);


--
-- TOC entry 1826 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-04-12 16:08:26

--
-- PostgreSQL database dump complete
--

