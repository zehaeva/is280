create database "MVGOClub" encoding 'UTF8';

create user goclub_site password 'goclubreadonly';

--ACCESS DB
REVOKE CONNECT ON DATABASE "MVGOClub" FROM PUBLIC;
GRANT  CONNECT ON DATABASE "MVGOClub"  TO goclub_site;

--ACCESS SCHEMA
REVOKE ALL     ON SCHEMA public FROM PUBLIC;
GRANT  USAGE   ON SCHEMA public  TO goclub_site;

--ACCESS TABLES
REVOKE ALL ON ALL TABLES IN SCHEMA public FROM PUBLIC ;
GRANT SELECT, INSERT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO goclub_site;

create table "users" ("user_id" serial primary key, 
                      "user_name" text, 
                      "given_name" text, 
                      "sur_name" text, 
                      "salt" text, 
                      "password" text, 
                      "pandanet_id" text, 
                      "ogs_id" text, 
                      "kgs_id" text, 
                      "aga_id" text
				);
                      
create table "games" ("game_id" serial primary key, 
                      "date_played" timestamp, 
                      "date_uploaded" timestamp, 
                      "white_player" bigint, 
                      "black_player" bigint, 
                      "file_url" text
				);

insert into "users" (user_name, given_name, sur_name) values 
  ('zehaeva', 'Howard', 'Canaway'), 
  ('realitysyndrome', 'Krista', 'Heath'), 
  ('thewilson', 'Andrew', 'Wilson');
  
insert into "games" (date_played, date_uploaded, white_player, black_player) values
  ('2017-1-1', '2017-1-2', 1, 2),
  ('2017-1-1', '2017-1-2', 2, 3),
  ('2017-1-1', '2017-1-2', 1, 3);
