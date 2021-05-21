/* Admin-Password = abcd1234 */
INSERT INTO users (name, email, password, isMod, created_at) VALUES ('Admin','admin@adm.in','$2y$10$uUD0wQXkpzhSVTn7mi8Re.bTPvjzfOEkOH4MsNr4cHqehtm/4N3wW','true', NOW());

UPDATE users SET isMod = 'true' WHERE name = 'admin';