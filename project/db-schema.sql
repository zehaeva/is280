create database "MVGOClub" encoding 'UTF8';

create table "users" ("user_id" serial primary key, 
                      "user_name" text, 
                      "given_name" text, 
                      "sur_name" text, 
                      "salt" text, 
                      "password" text, 
                      "pandanet_profile_url" text, 
                      "aga_profile" text);
                      
create table "games" ("game_id" serial primary key, 
                      "date_played" timestamp, 
                      "date_uploaded" timestamp, 
                      "white_player" bigint, 
                      "black_player" bigint, 
                      "file_url" text);

insert into "users" (user_name, given_name, sur_name) values 
  ('zehaeva', 'Howard', 'Canaway'), 
  ('realitysyndrome', 'Krista', 'Heath'), 
  ('thewilson', 'Andrew', 'Wilson');
  
insert into "games" (date_played, date_uploaded, white_player, black_player) values
  ('2017-1-1', '2017-1-2', 1, 2),
  ('2017-1-1', '2017-1-2', 2, 3),
  ('2017-1-1', '2017-1-2', 1, 3);
